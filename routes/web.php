<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::get("/", [ProductController::class, "index"]) -> name("product");
Route::get('/index', function () {
    return view('index');
});