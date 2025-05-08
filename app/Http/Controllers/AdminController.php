<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }
}
 function kategori()
{
    $kategori = \App\Models\Kategori::all(); // pastikan model Kategori sudah ada
    return view('kategoriad', compact('kategori'));
}
