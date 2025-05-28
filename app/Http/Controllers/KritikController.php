<?php

namespace App\Http\Controllers;

use App\Models\kritiksaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KritikController extends Controller
{
    public function index(){
        $kontak=kritiksaran::all();
        return view('home.kritiksaran', compact('kontak'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        kritiksaran::create([
            'nama'    => $request->name,
            'email'   => $request->email,
            'subjek' => $request->subject,
            'konten'   => $request->message,
            'id_user' => Auth::id()
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas masukannya!');
    }

    
}
