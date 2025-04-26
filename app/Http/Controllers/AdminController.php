<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }
}
