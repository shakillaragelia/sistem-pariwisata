<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Kuliner;
use App\Models\Senbud;
use App\Models\Hotel;
use App\Models\Event;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //Index
    public function index()
    {
        $kategori = Kategori::all();
        $ikon = Kategori::whereIn('nama', [
            'Wisata Sejarah', 'Wisata Alam', 'Wisata Kuliner', 'Wisata Senbud',
        ])->take(5)->get();

        return view('home.index', compact('kategori', 'ikon'));
    }

    //Wisata
    public function wisata(Request $request)
    {
        $filter = $request->query('kategori');

        if ($filter === 'sejarah') {
            $data = Wisata::with('kategori')
                ->whereHas('kategori', fn($q) => $q->where('slug', 'sejarah'))
                ->paginate(12);
        } elseif ($filter === 'alam') {
            $data = Wisata::with('kategori')
                ->whereHas('kategori', fn($q) => $q->where('slug', 'alam'))
                ->paginate(12);
        } elseif ($filter === 'kuliner') {
            $data = Kuliner::with('kategori')->paginate(12);
        } elseif (in_array($filter, ['senibudaya', 'senbud'])) {
            $data = Senbud::with('kategori')->paginate(12);
        } else {
            $wisata  = Wisata::with('kategori')->get();
            $kuliner = Kuliner::with('kategori')->get();
            $senbud  = Senbud::with('kategori')->get();
            $data    = $wisata->concat($kuliner)->concat($senbud);
        }

        return view('home.wisata', compact('data', 'filter'));
    }

    //Hotel
    public function hotel()
    {
        $data = Hotel::latest()->paginate(12);
        return view('home.hotel', compact('data'));
    }

    public function detailHotel($slug)
    {
        $hotel = Hotel::where('slug', $slug)->firstOrFail();
        $rekomendasiWisata = $this->getNearbyWisata($hotel->latitude, $hotel->longitude);

        return view('home.detail-hotel', compact('hotel', 'rekomendasiWisata'));
    }

    //Detail Wisata
    public function detailAlam($slug)
    {
        $wisata = Wisata::with(['komentar.user', 'kategori'])
            ->where('slug', $slug)
            ->whereHas('kategori', fn($q) => $q->where('slug', 'alam'))
            ->firstOrFail();

        $rekomendasiHotel = $this->getNearbyHotels($wisata->latitude, $wisata->longitude);

        return view('home.detail-alam', compact('wisata', 'rekomendasiHotel'));
    }

    public function detailSejarah($slug)
    {
        $wisata = Wisata::with(['komentar.user', 'kategori'])
            ->where('slug', $slug)
            ->firstOrFail();

        $rekomendasiHotel = $this->getNearbyHotels($wisata->latitude, $wisata->longitude);

        return view('home.detail-sejarah', compact('wisata', 'rekomendasiHotel'));
    }

    public function detailKuliner($slug)
    {
        $kuliner = Kuliner::with(['komentar.user', 'kategori'])
            ->where('slug', $slug)
            ->firstOrFail();

        $rekomendasiHotel = $this->getNearbyHotels($kuliner->latitude, $kuliner->longitude);

        return view('home.detail-kuliner', compact('kuliner', 'rekomendasiHotel'));
    }

    public function detailSenbud($slug)
    {
        $senbud = Senbud::with(['komentar.user', 'kategori'])
            ->where('slug', $slug)
            ->firstOrFail();

        $rekomendasiHotel = $this->getNearbyHotels($senbud->latitude, $senbud->longitude);

        return view('home.detail-senbud', compact('senbud', 'rekomendasiHotel'));
    }

    //Event
    public function event()
    {
        $events = Event::latest()->paginate(12);
        return view('home.event', compact('events'));
    }

    //Search
    public function searchWisata(Request $request)
    {
        $keyword = $request->input('search');

        $wisata  = Wisata::where('nama', 'like', "%{$keyword}%")->with('kategori')->get();
        $kuliner = Kuliner::where('nama', 'like', "%{$keyword}%")->with('kategori')->get();
        $senbud  = Senbud::where('nama', 'like', "%{$keyword}%")->with('kategori')->get();

        $data = $wisata->concat($kuliner)->concat($senbud);

        return view('home.wisata', compact('data', 'keyword'));
    }

    public function searchHotel(Request $request)
    {
        $keyword = $request->input('search');
        $data = Hotel::where('nama', 'like', "%{$keyword}%")->paginate(12);

        return view('home.hotel', compact('data', 'keyword'));
    }

    //Helper : Rekomendasi Terdekat
    private function getNearbyHotels(float $lat, float $lng, int $radius = 10, int $limit = 3)
    {
        return DB::table('hotels')
            ->selectRaw("*, (6371 * acos(cos(radians(?)) * cos(radians(latitude)) *
                cos(radians(longitude) - radians(?)) +
                sin(radians(?)) * sin(radians(latitude)))) AS distance", [$lat, $lng, $lat])
            ->where('bintang', '>=', 3)
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->limit($limit)
            ->get();
    }

    private function getNearbyWisata(float $lat, float $lng, int $radius = 10, int $limit = 3)
    {
        return DB::table('wisatas')
            ->selectRaw("nama, slug, id_kategori, latitude, longitude,
                (6371 * acos(cos(radians(?)) * cos(radians(latitude)) *
                cos(radians(longitude) - radians(?)) +
                sin(radians(?)) * sin(radians(latitude)))) AS distance", [$lat, $lng, $lat])
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->limit($limit)
            ->get();
    }
}
