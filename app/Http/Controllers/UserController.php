<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Event;
use App\Models\Kategori;

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

}