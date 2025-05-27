<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User;
use App\Models\visit;
use App\Models\wisata;
use App\Models\senbud;
use App\Models\kuliner;
use App\Models\event;
use App\Models\hotel;
use App\Models\kritiksaran;

class StatistikOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Total Wisata', Wisata::count() + Kuliner::count() + Senbud::count()),
            Card::make('Total Event', event::count()),
            Card::make('Total Hotel', hotel::count()),
            Card::make('Total Pengguna', User::where('role', 'user')->count()),
            Card::make('Total Kritik Saran', kritiksaran::count()),
            Card::make('Total Pengunjung (Visit)', visit::count()),
        ];

    }
}