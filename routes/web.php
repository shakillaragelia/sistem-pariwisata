<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Indexcontroller;


Route::get("/", [ProductController::class, "index"]) -> name("product");

Route::get('/index', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/wisata', function () {
    return view('wisata');
});

Route::get('/event', function () {
    return view('event');
});

Route::get('/hotel', function () {
    return view('hotel');
});

Route::get('/kontak', function () {
    return view('kontak');
});




Route::get('/beranda', [Indexcontroller::class, 'beranda'])->name('beranda');