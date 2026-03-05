<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboard.admin');
    }

    public function kategori()
    {
        $kategori = Kategori::all();
        return view('kategoriad', compact('kategori'));
    }
}
