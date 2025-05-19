<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\Wisata;
use App\Models\Event;
use App\Models\Visit;
use App\Models\KritikSaran;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatistikOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Wisata', Wisata::count()),
            Card::make('Total Event', Event::count()),
            Card::make('Total Pengguna', User::where('role', 'user')->count()),
            Card::make('Total Kritik & Saran', KritikSaran::count()),
            Card::make('Total Kunjungan', Visit::count()),
        ];
    }
}

