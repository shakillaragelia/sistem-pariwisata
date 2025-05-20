<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class UserController extends Controller
{

public function wisata()
{
    $data = Wisata::latest()->get();
    return view('home.wisata', compact('data'));
}
}