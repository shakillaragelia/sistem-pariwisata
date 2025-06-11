<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Kuliner;
use App\Models\Senbud;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Event;
use App\Models\Kategori;
use App\Models\Komentar;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    //index
    public function index()
    {
        $kategori = Kategori::all();
        $ikon = Kategori::whereIn('nama', [
            'Wisata Sejarah',
            'Wisata Alam',
            'Wisata Kuliner',
            'Wisata Senbud',
        ])->take(5)->get();

        return view('home.index', compact('kategori', 'ikon'));
    }


    //wisata
    public function wisata()
    {
        $wisata = Wisata::latest()->get();
        $kuliner = Kuliner::latest()->get();
        $senbud = Senbud::latest()->get();
        $data = $wisata->concat($kuliner)->concat($senbud);

        return view('home.wisata', compact('data'));
    }

    
    //hotel
    public function hotel()
    {
        $data = Hotel::latest()->get(); 
        return view('home.hotel', compact('data'));
    }


    //detail hotel + rekomendasi wisata
    public function detailHotel($slug)
    {
        $hotel = Hotel::where('slug', $slug)->firstOrFail();

        $radius = 10; // km
        $rekomendasiWisata = DB::table('wisatas')
    ->selectRaw("nama, slug, id_kategori, latitude, longitude, 
        (6371 * acos(cos(radians(?)) * cos(radians(latitude)) *
        cos(radians(longitude) - radians(?)) + 
        sin(radians(?)) * sin(radians(latitude)))) AS distance", [
            $hotel->latitude, $hotel->longitude, $hotel->latitude
        ])
    ->having('distance', '<', $radius)
    ->orderBy('distance')
    ->limit(3)
    ->get();

// Tambahkan mapping kategori:
foreach ($rekomendasiWisata as $wisata) {
    switch ($wisata->id_kategori) {
        case 1:
            $wisata->kategori = 'alam';
            break;
        case 2:
            $wisata->kategori = 'sejarah';
            break;
        default:
            $wisata->kategori = null;
    }
}

  
        return view('home.detail-hotel', compact('hotel', 'rekomendasiWisata'));
    }


    //detail alam
    public function detailAlam($slug)
    {
        $wisata = Wisata::where('slug', $slug)->whereHas('kategori', function($q) {
            $q->where('slug', 'alam');
        })->firstOrFail();

        $komentar = $wisata->komentar()->latest()->get();
        $rekomendasiHotel = $this->getNearbyHotels($wisata->latitude, $wisata->longitude);

        return view('home.detail-alam', compact('wisata', 'komentar', 'rekomendasiHotel'));
    }

    //detail sejarah
    public function detailSejarah($slug)
    {
        $wisata = Wisata::where('slug', $slug)->firstOrFail();
        $komentar = $wisata->komentar()->latest()->get();

        $rekomendasiHotel = $this->getNearbyHotels($wisata->latitude, $wisata->longitude);

        return view('home.detail-sejarah', compact('wisata', 'komentar', 'rekomendasiHotel'));
    }


    //detail kuliner
    public function detailKuliner($slug)
    {
        $kuliner = Kuliner::where('slug', $slug)->firstOrFail();
        $komentar = $kuliner->komentar()->latest()->get();

        $rekomendasiHotel = $this->getNearbyHotels($kuliner->latitude, $kuliner->longitude);

        return view('home.detail-kuliner', compact('kuliner', 'komentar', 'rekomendasiHotel'));
    }


    //detail senbud
    public function detailSenbud($slug)
    {
        $senbud = Senbud::where('slug', $slug)->firstOrFail();
        $komentar = $senbud->komentar()->latest()->get();

        $rekomendasiHotel = $this->getNearbyHotels($senbud->latitude, $senbud->longitude);

        return view('home.detail-senbud', compact('senbud', 'komentar', 'rekomendasiHotel'));
    }

    //komentar
    public function simpanKomentar(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'type' => 'required',
            'komentar' => 'required',
        ]);

        $model = $request->type::findOrFail($request->id);

        $model->komentar()->create([
            'id_user' => auth()->id(),
            'komentar' => $request->komentar,
        ]);

        return back()->with('success', 'Komentar berhasil dikirim.');
    }

    //event
    public function event()
    {
        $events = Event::latest()->get();
        return view('home.event', compact('events')); 
    }

    // Fungsi bantu untuk rekomendasi hotel terdekat
    private function getNearbyHotels($lat, $lng)
    {
        $radius = 10; // km
        return DB::table('hotels')
            ->selectRaw("*, (6371 * acos(cos(radians(?)) * cos(radians(latitude)) *
                cos(radians(longitude) - radians(?)) + 
                sin(radians(?)) * sin(radians(latitude)))) AS distance", [
                    $lat, $lng, $lat
                ])
            ->where('bintang', '>=', 3)
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->limit(3)
            ->get();
    }

    //search wisata
    public function searchWisata(Request $request)
    {
        $keyword = $request->input('search');

        $wisata = \App\Models\Wisata::where('nama', 'like', '%' . $keyword . '%')->get();
        $kuliner = \App\Models\Kuliner::where('nama', 'like', '%' . $keyword . '%')->get();
        $senbud = \App\Models\Senbud::where('nama', 'like', '%' . $keyword . '%')->get();

        $data = $wisata->concat($kuliner)->concat($senbud);

        return view('home.wisata', compact('data', 'keyword'));
    }

        //search hotel
    public function searchHotel(Request $request)
    {
        $keyword = $request->input('search');

        $hotel = \App\Models\Hotel::where('nama', 'like', '%' . $keyword . '%')->get();

        $data = $hotel;

        return view('home.hotel', compact('data', 'keyword'));
    }

}