<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



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