<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function store(Request $request)
{
    $ip    = $request->ip();
    $today = now()->toDateString();

    $sudahAda = Visit::where('ip_address', $ip)
        ->where('tanggal', $today)
        ->exists();

    if (!$sudahAda) {
        Visit::create([
            'ip_address' => $ip,
            'tanggal'    => $today,
            'time'       => now()->toTimeString(),
            'online'     => 1,
            'id_session' => session()->getId(),
            'id_user'    => auth()->check() ? auth()->id() : null,
        ]);
    }

    return response()->json(['status' => 'recorded']);
}
}
