<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KritikController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\VisitController;

// ============================================================
// PUBLIC ROUTES
// ============================================================

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/about', fn() => view('home.about'))->name('about');

// Wisata
Route::get('/wisata', [UserController::class, 'wisata'])->name('wisata');
Route::get('/wisata/search', [UserController::class, 'searchWisata'])->name('wisata.search');

// Detail wisata
Route::get('/detail-alam/{slug}',    [UserController::class, 'detailAlam'])->name('detail.alam');
Route::get('/detail-sejarah/{slug}', [UserController::class, 'detailSejarah'])->name('detail.sejarah'); //sblmnya
Route::get('/detail-wisata/{slug}', [UserController::class, 'detailWisata'])->name('detail.wisata'); //baru
Route::get('/detail-kuliner/{slug}', [UserController::class, 'detailKuliner'])->name('detail.kuliner');
Route::get('/detail-senbud/{slug}',  [UserController::class, 'detailSenbud'])->name('detail.senbud');

// Hotel
Route::get('/hotel',         [UserController::class, 'hotel'])->name('hotel');
Route::get('/hotel/search',  [UserController::class, 'searchHotel'])->name('hotel.search');
Route::get('/detail-hotel/{slug}', [UserController::class, 'detailHotel'])->name('detailHotel');

// Event
Route::get('/event', [UserController::class, 'event'])->name('home.event');
Route::get('/event', [UserController::class, 'event'])->name('home.event');
Route::get('/detail-event/{slug}', [UserController::class, 'detailEvent'])->name('detail.event');

// Kritik Saran
Route::get('/saran',  [KritikController::class, 'index'])->name('home.saran');
Route::post('/kritik', [KritikController::class, 'store'])->name('kritik.store');

// Komentar
Route::post('/komentar', [KomentarController::class, 'store'])
    ->middleware('auth')
    ->name('komentar.store');

// Visit tracker 
Route::post('/api/record-visit', [VisitController::class, 'store'])
    ->middleware('throttle:60,1')
    ->name('visit.record');

// ============================================================
// AUTH — Admin
// ============================================================

Route::middleware('guest')->group(function () {
    Route::get('/login',  [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'auth']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ============================================================
// AUTH — User (Pengunjung)
// ============================================================

Route::middleware('guest')->group(function () {
    Route::get('/login-user',  [LoginController::class, 'showLoginForm'])->name('login.user');
    Route::post('/login-user', [LoginController::class, 'login'])->middleware('throttle:5,1');

    Route::get('/register',  [RegisterController::class, 'showForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::post('/logout-user', [LoginController::class, 'logout'])->name('logout.user')->middleware('auth');

// ============================================================
// ADMIN DASHBOARD
// ============================================================

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->name('dashboard.admin');
    Route::get('/kategoriad',      [AdminController::class, 'kategori'])->name('kategori.kategoriad');
});
