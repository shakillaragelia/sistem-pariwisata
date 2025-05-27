<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use App\Providers\Filament\AdminPanelProvider;
use Illuminate\Support\Facades\Request;
use App\Models\Visit;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register Filament Admin Panel
        app()->register(AdminPanelProvider::class);

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
