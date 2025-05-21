<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Indexcontroller;


Route::get('/', [UserController::class, 'index']);

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/wisata', [UserController::class, 'wisata']);

Route::get('/event', function () {
    return view('home.event');
});

Route::get('/hotel', [UserController::class, 'hotel']);

Route::get('/detail-hotel/{slug}', [UserController::class, 'detailHotel']);

Route::get('/kontak', function () {
    return view('home.kontak');
});

Route::get('/detail-wisata/{slug}', [UserController::class, 'detailWisata']);
Route::post('/detail-wisata/{slug}/komentar', [UserController::class, 'kirimKomentar']);


Route::get('/list-wisata', function () {
    return view('home.list-wisata');
});

Route::get('/senbud-detail', function () {
    return view('home.senbud-detail');
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register_proses']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth']);

Route::get('dashboard/admin', [AdminController::class, 'index'])->name('dashboard.admin');
Route::get('/kategoriad', [AdminController::class, 'kategori'])->name('kategori.kategoriad');
