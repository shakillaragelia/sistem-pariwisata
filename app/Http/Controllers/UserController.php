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
    public function index()
    {
        $kategori = Kategori::all();
        $ikon = Kategori::whereIn('nama', [
            'Wisata Sejarah', 'Wisata Alam', 'Wisata Kuliner', 'Wisata Senbud',
        ])->take(5)->get();

        return view('home.index', compact('kategori', 'ikon'));
    }

    public function wisata(Request $request)
    {
        $filter = $request->query('kategori');

        // Query dasar dari masing-masing tabel dengan kolom yang disamakan
        $qWisata = DB::table('wisatas')
            ->join('kategoris', 'wisatas.id_kategori', '=', 'kategoris.id_kategori')
            ->select('wisatas.nama', 'wisatas.slug', 'wisatas.deskripsi', 'wisatas.gambar', 'kategoris.slug as kategori_slug', 'kategoris.nama as kategori_nama', DB::raw("'wisata' as type"));

        $qKuliner = DB::table('kuliners')
            ->join('kategoris', 'kuliners.id_kategori', '=', 'kategoris.id_kategori')
            ->select('kuliners.nama', 'kuliners.slug', 'kuliners.deskripsi', 'kuliners.gambar', 'kategoris.slug as kategori_slug', 'kategoris.nama as kategori_nama', DB::raw("'kuliner' as type"));

        $qSenbud = DB::table('senbuds')
            ->join('kategoris', 'senbuds.id_kategori', '=', 'kategoris.id_kategori')
            ->select('senbuds.nama', 'senbuds.slug', 'senbuds.deskripsi', 'senbuds.gambar', 'kategoris.slug as kategori_slug', 'kategoris.nama as kategori_nama', DB::raw("'senbud' as type"));

        // Gabungkan semuanya
        $combined = $qWisata->union($qKuliner)->union($qSenbud);

        // Jika ada filter kategori
        if ($filter) {
            $data = DB::table(DB::raw("({$combined->toSql()}) as combined"))
                ->mergeBindings($combined)
                ->where('kategori_slug', $filter)
                ->paginate(12);
        } else {
            $data = DB::table(DB::raw("({$combined->toSql()}) as combined"))
                ->mergeBindings($combined)
                ->paginate(12);
        }

        $kategoris = Kategori::all();

        return view('home.wisata', compact('data', 'filter', 'kategoris'));
    }

    public function detailWisata($slug)
    {
        $wisata = Wisata::with(['komentar.user', 'kategori'])
            ->where('slug', $slug)
            ->firstOrFail();

        $rekomendasiHotel = $this->getNearbyHotels($wisata->latitude, $wisata->longitude);

        return view('home.detail-wisata', compact('wisata', 'rekomendasiHotel'));
    }

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

    public function detailAlam($slug)
    {
        $wisata = Wisata::with(['komentar.user', 'kategori'])
            ->where('slug', $slug)
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

        return view('home.detail-kuliner', compact('kuliner'));
    }

    public function detailSenbud($slug)
    {
        $senbud = Senbud::with(['komentar.user', 'kategori'])
            ->where('slug', $slug)
            ->firstOrFail();

        return view('home.detail-senbud', compact('senbud'));
    }

    public function event()
    {
        $events = Event::latest()->paginate(12);
        return view('home.event', compact('events'));
    }

    public function searchWisata(Request $request)
    {
        $keyword = $request->input('search');
        $data = Wisata::where('nama', 'like', "%{$keyword}%")->with('kategori')->paginate(12);
        $kategoris = Kategori::all();
        $filter = null;

        return view('home.wisata', compact('data', 'keyword', 'filter', 'kategoris'));
    }

    public function searchHotel(Request $request)
    {
        $keyword = $request->input('search');
        $data = Hotel::where('nama', 'like', "%{$keyword}%")->paginate(12);

        return view('home.hotel', compact('data', 'keyword'));
    }

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