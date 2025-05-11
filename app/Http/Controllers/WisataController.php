<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisata;
use Illuminate\Support\Str;

class WisataController extends Controller
{
    public function index()
    {
        $wisata = Wisata::all();
        return view('wisata.wisataad', compact('wisata'));
    }

    public function create()
    {
        return view('admin.wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'lokasi' => 'required',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images/wisata'), $gambarName);
            $data['gambar'] = $gambarName;
        }

        Wisata::create($data);

        return redirect()->route('wisata.index')->with('success', 'Data wisata berhasil ditambahkan');
    }

    public function edit($id)
    {
        $wisata = Wisata::findOrFail($id);
        return view('admin.wisata.edit', compact('wisata'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'id_kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'lokasi' => 'required',
            'gambar' => 'nullable|image|max:2048'
        ]);

        $wisata = Wisata::findOrFail($id);

        $data = $request->all();
        $data['slug'] = Str::slug($request->nama);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarName = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('images/wisata'), $gambarName);
            $data['gambar'] = $gambarName;
        }

        $wisata->update($data);

        return redirect()->route('wisata.index')->with('success', 'Data wisata berhasil diperbarui');
    }

    public function destroy($id)
    {
        $wisata = Wisata::findOrFail($id);
        if ($wisata->gambar && file_exists(public_path('images/wisata/' . $wisata->gambar))) {
            unlink(public_path('images/wisata/' . $wisata->gambar));
        }
        $wisata->delete();

        return redirect()->route('wisata.index')->with('success', 'Data wisata berhasil dihapus');
    }
}
