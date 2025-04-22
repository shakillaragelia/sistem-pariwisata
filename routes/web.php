<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Indexcontroller;


Route::get("/", [ProductController::class, "index"]) -> name("product");
Route::get('/index', function () {
    return view('index');
});

Route::get('/sejarah', function () {
    return view('sejarah-details');
});

Route::get('/detail-blog', function () {
    return view('blog-details');
});

Route::get('/detail-hotel', function () {
    return view('hotel-details');
});

Route::get('/beranda', [Indexcontroller::class, 'beranda'])->name('beranda');