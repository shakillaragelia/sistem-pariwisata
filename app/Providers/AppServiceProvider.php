<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;

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
        if (class_exists(Filament::class)) {
            Filament::serving(function () {
                // Tangkap URL asal jika dikirim via ?redirect=
                if (request()->has('redirect')) {
                    session(['url.intended' => request('redirect')]);
                }

                // Cegat user biasa dari masuk dashboard admin
                if (auth()->check() && auth()->user()->role !== 'admin') {
                    redirect()->intended('/')->send();
                }
            });
        }
    }
}