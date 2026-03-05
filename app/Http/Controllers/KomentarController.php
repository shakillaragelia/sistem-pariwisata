<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;
use App\Models\Wisata;
use App\Models\Kuliner;
use App\Models\Senbud;

class KomentarController extends Controller
{
    private const ALLOWED_MODELS = [
        'wisata'  => Wisata::class,
        'kuliner' => Kuliner::class,
        'senbud'  => Senbud::class,
    ];

    public function store(Request $request)
    {
        $request->validate([
            'komentar' => 'required|string',
            'type'     => 'required|string',
            'id'       => 'required|integer',
        ]);

        $modelClass = self::ALLOWED_MODELS[$request->type] ?? null;

        if (!$modelClass || !class_exists($modelClass)) {
            return back()->withErrors(['error' => 'Tipe objek komentar tidak valid.']);
        }

        $modelId = $request->input('id');
        $item = $modelClass::find($modelId);

        if (!$item) {
            return back()->withErrors(['error' => 'Data tidak ditemukan.']);
        }

        $item->komentar()->create([
            'id_user'  => auth()->id(),
            'komentar' => $request->komentar,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}
