<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visit;
use Carbon\Carbon;

class RecordVisit
{
    public function handle(Request $request, Closure $next)
    {
        $ip = $request->ip();
        $tanggal = now()->toDateString();
    
        $cacheKey = "visit_{$ip}_{$tanggal}";
    
        if (!cache()->has($cacheKey)) {
    
            $sudahAda = Visit::where('ip_address', $ip)
                             ->where('tanggal', $tanggal)
                             ->exists();
    
            if (!$sudahAda) {
                Visit::create([
                    'id_user' => auth()->check() ? auth()->id() : null,
                    'id_session' => session()->getId(),
                    'ip_address' => $ip,
                    'tanggal' => $tanggal,
                    'online' => 1,
                    'time' => now(),
                ]);
            }
    
            cache()->put($cacheKey, true, now()->addHours(24));
        }
    
        return $next($request);
    }
    
    
}
