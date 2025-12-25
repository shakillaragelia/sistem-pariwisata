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
        if (!app()->runningInConsole() && !app()->runningUnitTests()) {
            // Logic moved to LogVisit middleware
        }
    }
}