<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
{
    return view('auth.login');
}

public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Ambil parameter redirect kalau ada
        $redirect = $request->input('redirect');

        // Kalau ada redirect → arahkan ke sana, kalau tidak → fallback ke halaman utama
        return redirect()->to($redirect ?? '/');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah.',
    ])->onlyInput('email');
}



}