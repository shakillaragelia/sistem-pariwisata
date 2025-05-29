<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\FilamentGeocodeServiceProvider;
use App\Models\Visit;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Tracking kunjungan otomatis (selain admin route)
        if (!app()->runningInConsole() && !app()->runningUnitTests()) {
            if (!request()->is('admin*')) {
                $data = [
                    'ip_address' => request()->ip(),
                    'id_session' => session()->getId(),
                    'tanggal' => now()->toDateString(),
                    'time' => now()->toTimeString(),
                    'online' => 1,
                ];

                if (auth()->check()) {
                    $data['id_user'] = auth()->id();
                }

                Visit::create($data);
            }
        }
    }
}