<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogVisitor
{
    public function handle(Request $request, Closure $next)
    {
        // Skip jika user adalah admin
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Simpan ke tabel visit_logs
        DB::table('visit_logs')->insert([
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
            'visited_at' => now()
        ]);

        return $next($request);
    }
}
