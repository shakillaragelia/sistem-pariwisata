<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function showForm(): View
    {
        return view('auth.register');
    }


//regis pengunjung
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6|confirmed',
    ]);

    $validated['password'] = Hash::make($validated['password']);
    $validated['role'] = 'user'; 

    User::create($validated);


    return redirect()->route('login.user')->with('success', 'Akun berhasil dibuat. Silakan login!');
}

}
