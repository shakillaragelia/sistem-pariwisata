<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Event;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

public function wisata()
{
    $data = Wisata::latest()->get();
    return view('home.wisata', compact('data'));
}

public function index()
{
    $kategori = Kategori::all();
    $ikon = Kategori::whereIn('nama', [
        'Wisata Sejarah',
        'Wisata Alam',
        'Wisata Kuliner'
    ])->take(3)->get();
    

    return view('home.index', compact('kategori', 'ikon'));
}

public function hotel()
{
    $data = Hotel::latest()->get(); 
    return view('home.hotel', compact('data'));
}

public function detailHotel($slug)
{
    $hotel = Hotel::where('slug', $slug)->firstOrFail();

   
    $radius = 10; // km
    $rekomendasiWisata = DB::table('wisatas')
        ->selectRaw("*, (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * 
            cos(radians(longitude) - radians(?)) + 
            sin(radians(?)) * sin(radians(latitude)))) AS distance", [
                $hotel->latitude, $hotel->longitude, $hotel->latitude
            ])
        ->having('distance', '<', $radius)
        ->orderBy('distance')
        ->limit(3)
        ->get();

    return view('home.detail-hotel', compact('hotel', 'rekomendasiWisata'));
}

}