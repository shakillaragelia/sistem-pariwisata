<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visit;

class RecordVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!app()->runningInConsole() && !$request->is('admin/*')) {
            Visit::create([
                'ip_address' => $request->ip(),
                'id_user' => auth()->check() ? auth()->id() : null,
                'id_session' => session()->getId(),
                'tanggal' => now()->toDateString(), 
                'time' => now()->format('Y-m-d H:i:s'), 
                'online' => true,
            ]);
        }

        return $next($request);
    }
}
