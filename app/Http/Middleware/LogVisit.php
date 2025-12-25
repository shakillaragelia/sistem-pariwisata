<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogVisit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!app()->runningInConsole() && !app()->runningUnitTests() && !$request->is('admin*')) {
            try {
                $data = [
                    'ip_address' => $request->ip(),
                    'id_session' => session()->getId(),
                    'tanggal' => now()->toDateString(),
                    'time' => now()->toTimeString(),
                    'online' => 1,
                    'id_user' => auth()->id(), // Null if not logged in
                ];

                \App\Models\Visit::create($data);
            } catch (\Exception $e) {
                // Silently fail if DB is down to prevent app crash
                // Log::error('Failed to log visit: ' . $e->getMessage());
            }
        }

        return $next($request);
    }
}
