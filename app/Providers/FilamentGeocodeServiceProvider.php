<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\ServiceProvider;

class FilamentGeocodeServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Filament::serving(function () {
            FilamentAsset::register([
                Js::make('geocode', asset('js/filament/custom/geocode.js')),
            ]);
        });
    }
}
