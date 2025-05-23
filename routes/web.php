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
Route::get('/detail-alam/{slug}', [UserController::class, 'detailAlam'])->name('detail.alam');
Route::get('/detail-sejarah/{slug}', [UserController::class, 'detailSejarah'])->name('detail.sejarah');
Route::get('/detail-kuliner/{slug}', [UserController::class, 'detailKuliner'])->name('detail.kuliner');
Route::get('/detail-senbud/{slug}', [UserController::class, 'detailSenbud'])->name('detail.senbud');

Route::get('/event', function () {
    return view('home.event');
});

Route::get('/hotel', [UserController::class, 'hotel']);

Route::get('/detail-hotel/{slug}', [UserController::class, 'detailHotel']);

Route::get('/kontak', function () {
    return view('home.kontak');
});

//KOMENTAR
Route::post('/wisata/{id}/komentar', [UserController::class, 'storeKomentarWisata'])->name('komentar.wisata.store');
Route::post('/komentar', [UserController::class, 'simpanKomentar'])->name('komentar.store');

//ADMIN
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register_proses']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth']);


//USER
Route::get('/login-user', [AuthController::class, 'loginForm'])->name('login.user');
Route::post('/login-user', [AuthController::class, 'login']);
Route::get('/register-user', [AuthController::class, 'registerForm'])->name('register.user');
Route::post('/register-user', [AuthController::class, 'register']);
Route::post('/logout-user', [AuthController::class, 'logout'])->name('logout.user');

//VISIT
    Route::middleware('log.visitor')->group(function () {
    Route::get('/wisata-alam/{slug}', [UserController::class, 'detailAlam']);
    Route::get('/wisata-sejarah/{slug}', [UserController::class, 'detailSejarah']);
    Route::get('/wisata-kuliner/{slug}', [UserController::class, 'detailKuliner']);
    Route::get('/wisata-senbud/{slug}', [UserController::class, 'detailSenbud']);
});



Route::get('dashboard/admin', [AdminController::class, 'index'])->name('dashboard.admin');
Route::get('/kategoriad', [AdminController::class, 'kategori'])->name('kategori.kategoriad');