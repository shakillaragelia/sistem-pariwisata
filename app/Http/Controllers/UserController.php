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

    // Gabungkan semua data jadi satu koleksi
    $data = $wisata->concat($kuliner)->concat($senbud);

    return view('home.wisata', compact('data'));
}


//hotel
    public function hotel()
    {
        $data = Hotel::latest()->get(); 
        return view('home.hotel', compact('data'));
    }

    public function detailHotel($slug)
    {
        $hotel = Hotel::where('slug', $slug)->firstOrFail();

        // Rekomendasi wisata terdekat
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

    // Detail Wisata Alam
    public function detailAlam($slug)
    {
        $wisata = Wisata::where('slug', $slug)->whereHas('kategori', function($q) {
            $q->where('slug', 'alam');
        })->firstOrFail();

        $komentar = $wisata->komentar()->latest()->get();
        return view('home.detail-alam', compact('wisata', 'komentar'));
    }

    // Detail Wisata Sejarah
    public function detailSejarah($slug)
{
    $wisata = Wisata::where('slug', $slug)->firstOrFail();
    $komentar = $wisata->komentar()->latest()->get();

    return view('home.detail-sejarah', compact('wisata', 'komentar'));
}


    // Detail Kuliner
    public function detailKuliner($slug)
    {
        $kuliner = Kuliner::where('slug', $slug)->firstOrFail();
        $komentar = $kuliner->komentar()->latest()->get();
        return view('home.detail-kuliner', compact('kuliner', 'komentar'));
    }

    // Detail Seni Budaya
    public function detailSenbud($slug)
    {
        $senbud = Senbud::where('slug', $slug)->firstOrFail();
        $komentar = $senbud->komentar()->latest()->get();
        return view('home.detail-senbud', compact('senbud', 'komentar'));
    }

    // Komentar Polymorphic
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
    $events = event::latest()->get();
    return view('home.event', compact('events')); 
}


}
