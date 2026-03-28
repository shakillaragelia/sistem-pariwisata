<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Hotel;
use App\Models\Event;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

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
    $kategoris = Kategori::all();

    if ($filter) {
        $data = Wisata::with('kategori')
            ->whereHas('kategori', fn($q) => $q->where('slug', $filter))
            ->paginate(12);
    } else {
        $data = Wisata::with('kategori')->paginate(12);
    }

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
    $data = Wisata::where('nama', 'like', "%{$keyword}%")
        ->with('kategori')
        ->paginate(12);
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
        $hotels = DB::table('hotels')
            ->selectRaw("*, (6371 * acos(cos(radians(?)) * cos(radians(latitude)) *
                cos(radians(longitude) - radians(?)) +
                sin(radians(?)) * sin(radians(latitude)))) AS distance", [$lat, $lng, $lat])
            ->where('bintang', '>=', 1) // Menurunkan syarat bintang agar lebih banyak hasil
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->limit($limit)
            ->get();

        foreach ($hotels as $hotel) {
            $hotel->distance = $this->getRoadDistance($lat, $lng, $hotel->latitude, $hotel->longitude) ?? $hotel->distance;
        }

        return $hotels;
    }

    private function getNearbyWisata(float $lat, float $lng, int $radius = 10, int $limit = 3)
    {
        $wisatas = DB::table('wisatas')
            ->join('kategoris', 'wisatas.id_kategori', '=', 'kategoris.id_kategori')
            ->selectRaw("wisatas.nama, wisatas.slug, kategoris.slug as kategori, wisatas.latitude, wisatas.longitude,
                (6371 * acos(cos(radians(?)) * cos(radians(latitude)) *
                cos(radians(longitude) - radians(?)) +
                sin(radians(?)) * sin(radians(latitude)))) AS distance", [$lat, $lng, $lat])
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->limit($limit)
            ->get();

        foreach ($wisatas as $wisata) {
            $wisata->distance = $this->getRoadDistance($lat, $lng, $wisata->latitude, $wisata->longitude) ?? $wisata->distance;
        }

        return $wisatas;
    }

    private function getRoadDistance($lat1, $lon1, $lat2, $lon2)
    {
        try {
            // Memanggil OSRM API (Gratis) untuk rute jalan kaki/berkendara
            $response = Http::timeout(3)->get("https://router.project-osrm.org/route/v1/driving/{$lon1},{$lat1};{$lon2},{$lat2}", [
                'overview' => 'false',
            ]);

            if ($response->successful() && isset($response->json()['routes'][0]['distance'])) {
                // Jarak dalam meter diubah ke kilometer
                return $response->json()['routes'][0]['distance'] / 1000;
            }
        } catch (\Exception $e) {
            return null;
        }
        return null;
    }
}