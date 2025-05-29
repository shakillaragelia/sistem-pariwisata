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
    // INDEX
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

    // WISATA
    public function wisata()
    {
        $wisata = Wisata::latest()->get();
        $kuliner = Kuliner::latest()->get();
        $senbud = Senbud::latest()->get();

        $data = $wisata->concat($kuliner)->concat($senbud);
        return view('home.wisata', compact('data'));
    }

    // HOTEL
    public function hotel()
    {
        $data = Hotel::latest()->get(); 
        return view('home.hotel', compact('data'));
    }

    // DETAIL HOTEL + REKOMENDASI WISATA TERDEKAT
    public function detailHotel($slug)
    {
        $hotel = Hotel::where('slug', $slug)->firstOrFail();

        $radius = 10; // KM
        $rekomendasiWisata = DB::table('wisatas')
            ->join('kategoris', 'wisatas.id_kategori', '=', 'kategoris.id_kategori')
            ->select('wisatas.*', 'kategoris.slug as kategori_slug')
            ->selectRaw('(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * 
                        cos(radians(longitude) - radians(?)) + 
                        sin(radians(?)) * sin(radians(latitude)))) AS distance', [
                            $hotel->latitude, $hotel->longitude, $hotel->latitude
                        ])
            ->having('distance', '<', $radius)
            ->orderBy('distance')
            ->limit(3)
            ->get();

        return view('home.detail-hotel', compact('hotel', 'rekomendasiWisata'));
    }

    // DETAIL ALAM
    public function detailAlam($slug)
    {
        $wisata = Wisata::where('slug', $slug)
            ->whereHas('kategori', fn($q) => $q->where('slug', 'alam'))
            ->firstOrFail();

        $komentar = $wisata->komentar()->latest()->get();
        return view('home.detail-alam', compact('wisata', 'komentar'));
    }

    // DETAIL SEJARAH
    public function detailSejarah($slug)
    {
        $wisata = Wisata::where('slug', $slug)
            ->whereHas('kategori', fn($q) => $q->where('slug', 'sejarah'))
            ->firstOrFail();

        $komentar = $wisata->komentar()->latest()->get();
        return view('home.detail-sejarah', compact('wisata', 'komentar'));
    }

    // DETAIL KULINER
    public function detailKuliner($slug)
    {
        $kuliner = Kuliner::where('slug', $slug)->firstOrFail();
        $komentar = $kuliner->komentar()->latest()->get();
        return view('home.detail-kuliner', compact('kuliner', 'komentar'));
    }

    // DETAIL SENI BUDAYA
    public function detailSenbud($slug)
    {
        $senbud = Senbud::where('slug', $slug)->firstOrFail();
        $komentar = $senbud->komentar()->latest()->get();
        return view('home.detail-senbud', compact('senbud', 'komentar'));
    }

    // SIMPAN KOMENTAR (POLYMORPHIC)
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

    // EVENT
    public function event()
    {
        $events = Event::latest()->get();
        return view('home.event', compact('events'));
    }
}
