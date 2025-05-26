<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Indexcontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KritikController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\RegisterController;



Route::get('/', [UserController::class, 'index'])->name('home');


Route::get('/about', function () {
    return view('home.about');
});

Route::get('/wisata', [UserController::class, 'wisata']);
Route::get('/detail-alam/{slug}', [UserController::class, 'detailAlam'])->name('detail.alam');
Route::get('/detail-sejarah/{slug}', [UserController::class, 'detailSejarah'])->name('detail.sejarah');
Route::get('/detail-kuliner/{slug}', [UserController::class, 'detailKuliner'])->name('detail.kuliner');
Route::get('/detail-senbud/{slug}', [UserController::class, 'detailSenbud'])->name('detail.senbud');

Route::get('/event', [UserController::class, 'event'])->name('home.event');


Route::get('/hotel', [UserController::class, 'hotel']);

Route::get('/detail-hotel/{slug}', [UserController::class, 'detailHotel']);



//KOMENTAR
Route::post('/wisata/{id}/komentar', [UserController::class, 'storeKomentarWisata'])->name('komentar.wisata.store');
Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');
Route::get('/wisata/sejarah/{slug}', [UserController::class, 'detailSejarah'])->name('detail.sejarah');

//kririksarab(kontak)
Route::get('/kontak', [KritikController::class, 'index'])->name('home.kontak');
Route::post('/kritik', [KritikController::class, 'store'])->name('kritik.store');


//ADMIN
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'register_proses']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'auth']);


// Login user
Route::get('/login-user', [LoginController::class, 'showLoginForm'])->name('login.user');
Route::post('/login-user', [LoginController::class, 'login']);

//logout user
Route::post('/logout-user', [LoginController::class, 'logout']);



// Register user
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);



//VISIT
    
    Route::get('/wisata-alam/{slug}', [UserController::class, 'detailAlam']);
    Route::get('/wisata-sejarah/{slug}', [UserController::class, 'detailSejarah']);
    Route::get('/wisata-kuliner/{slug}', [UserController::class, 'detailKuliner']);
    Route::get('/wisata-senbud/{slug}', [UserController::class, 'detailSenbud']);




Route::get('dashboard/admin', [AdminController::class, 'index'])->name('dashboard.admin');
Route::get('/kategoriad', [AdminController::class, 'kategori'])->name('kategori.kategoriad');