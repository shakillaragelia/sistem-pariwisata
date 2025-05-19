<?php

namespace App\Filament\Pages;

use App\Models\kritiksaran;
use App\Models\Wisata;
use App\Models\Hotel;
use App\Models\Event;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Visit;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\StatsOverviewWidget\Stat;

class Dashboard extends BaseDashboard
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Wisata', wisata::count()),
            Stat::make('Total Hotel', hotel::count()),
            Stat::make('Total Event', event::count()),
            Stat::make('Total User', User::where('role', 'user')->count()),
            Stat::make('Kritik & Saran', kritiksaran::count()),
            Stat::make('Visit Website', visit::count()),
        ];
    }
}
