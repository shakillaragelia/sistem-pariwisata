<?php

namespace App\Providers;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Facades\FilamentAsset;

class FilamentGeocodeServiceProvider implements Plugin
{
    public function getId(): string
    {
        return 'geocode-script';
    }

    public function register(Panel $panel): Panel
    {
        return $panel;
    }

    public function boot(Panel $panel): void
    {
        FilamentAsset::register(
            assets: [
                FilamentAsset::script('geocode', asset('js/filament/custom/geocode.js')),
            ],
            package: 'geocode-script'
        );
    }

    public static function make(): static
    {
        return new static();
    }
}
