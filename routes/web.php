<?php

use Illuminate\Http\Request;
use App\Models\Visit;
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

Route::get('/wisata', [UserController::class, 'wisata'])->name('wisata');

Route::get('/wisata/search', [UserController::class, 'searchWisata'])->name('wisata.search');
Route::get('/detail-alam/{slug}', [UserController::class, 'detailAlam'])->name('detail.alam');
Route::get('/detail-sejarah/{slug}', [UserController::class, 'detailSejarah'])->name('detail.sejarah');
Route::get('/detail-kuliner/{slug}', [UserController::class, 'detailKuliner'])->name('detail.kuliner');
Route::get('/detail-senbud/{slug}', [UserController::class, 'detailSenbud'])->name('detail.senbud');

Route::get('/event', [UserController::class, 'event'])->name('home.event');


Route::get('/hotel', [UserController::class, 'hotel']);
Route::get('/hotel/search', [UserController::class, 'searchHotel'])->name('hotel.search');
Route::get('/detail-hotel/{slug}', [UserController::class, 'detailHotel'])->name('detailHotel');



//KOMENTAR
Route::post('/wisata/{id}/komentar', [UserController::class, 'storeKomentarWisata'])->name('komentar.wisata.store');
Route::post('/komentar', [KomentarController::class, 'store'])->name('komentar.store');
Route::get('/wisata/sejarah/{slug}', [UserController::class, 'detailSejarah'])->name('detail.sejarah');

//kririksarab(kontak)
Route::get('/saran', [KritikController::class, 'index'])->name('home.saran');
Route::post('/kritik', [KritikController::class, 'store'])->name('kritik.store');


// AUTHENTICATION
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);


// ADMIN
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard/admin', [AdminController::class, 'index'])->name('dashboard.admin');
    Route::get('/kategoriad', [AdminController::class, 'kategori'])->name('kategori.kategoriad');
});

// NEW VISIT
Route::post('/api/record-visit', function (Request $request) {
    $ip = $request->ip();
    $agent = $request->header('User-Agent');
    $today = now()->toDateString();

    $alreadyLogged = Visit::where('ip_address', $ip)
        ->where('user_agent', $agent)
        ->whereDate('visit_time', $today)
        ->exists();

    if (!$alreadyLogged) {
        Visit::create([
            'ip_address' => $ip,
            'user_agent' => $agent,
            'visit_time' => now(),
        ]);
    }

    return response()->json(['status' => 'recorded']);
});