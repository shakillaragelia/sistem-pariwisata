<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Event;
use App\Models\Kategori;
use App\Models\Komentar;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
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

    public function wisata()
    {
        $data = Wisata::latest()->get();
        return view('home.wisata', compact('data'));
    }

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

    public function detailWisata($slug)
    {
        $wisata = Wisata::where('slug', $slug)->firstOrFail();
        $komentar = $wisata->komentars()->latest()->get();

        return view('home.detail-wisata', compact('wisata', 'komentar'));
    }

    public function kirimKomentar(Request $request, $slug)
    {
        $wisata = Wisata::where('slug', $slug)->firstOrFail();

        $request->validate([
            'komentar' => 'required|string|max:500',
        ]);

        $wisata->komentars()->create([
            'id_user' => auth()->id(),
            'komentar' => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim!');
    }

    public function simpanKomentar(Request $request)
    {
        $request->validate([
            'komentar' => 'required|string|max:1000',
            'type' => 'required|string',
            'id' => 'required|integer',
        ]);
    
        $modelClass = $request->type;
    
        if (!class_exists($modelClass)) {
            return abort(404, 'Model tidak ditemukan');
        }
    
        $item = $modelClass::findOrFail($request->id);
    
        $item->komentars()->create([
            'id_user' => auth()->id(),
            'komentar' => $request->komentar,
        ]);
    
        return back()->with('success', 'Komentar berhasil dikirim!');
    }

}
