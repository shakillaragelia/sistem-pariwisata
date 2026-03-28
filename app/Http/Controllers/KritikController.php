<?php

namespace App\Http\Controllers;

use App\Models\Kritiksaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KritikController extends Controller
{
    public function index()
    {
        $kontak = Kritiksaran::all();
        return view('home.kritiksaran', compact('kontak'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|in:Kritik,Saran,Pertanyaan,Kerja Sama,Lainnya',
            'message' => 'required|string',
        ]);

        Kritiksaran::create([
            'subjek'          => $request->subject,
            'konten'          => $request->message,
            'email_pengirim'  => $request->email,
            'nama_pengirim'   => $request->name,
            'id_user'         => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas masukannya!');
    }
}