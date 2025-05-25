<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;

class KomentarController extends Controller
{
    public function store(Request $request)
    {
        

        $request->validate([
            'komentar' => 'required|string',
            'type' => 'required|string',
            'id' => 'required|integer',
        ]);

        $modelClass = $request->input('type');
        $modelId = $request->input('id');

        if (!class_exists($modelClass)) {
            return back()->withErrors(['error' => 'Tipe objek komentar tidak valid.']);
        }

        $item = $modelClass::findOrFail($modelId);

        // ⛳ INSERT komentar ke DB
        $item->komentar()->create([
            'id_user' => auth()->id(), // PENTING: gunakan nama kolom yg benar sesuai tabel!
            'komentar' => $request->komentar,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
