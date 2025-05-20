<?php

namespace App\Filament\Pages;

use App\Models\kritiksaran;
use App\Models\Wisata;
use App\Models\Hotel;
use App\Models\Event;
use App\Models\User;
use App\Models\Visit;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Filament\Widgets\VisitChart;

class Dashboard extends BaseDashboard
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Wisata', Wisata::count())->columnSpan(2),
            Stat::make('Total Hotel', Hotel::count())->columnSpan(2),
            Stat::make('Total Event', Event::count())->columnSpan(2),
            Stat::make('Total User', User::where('role', 'user')->count())->columnSpan(2),
            Stat::make('Kritik & Saran', kritiksaran::count())->columnSpan(2),
            Stat::make('Visit Website', Visit::count())->columnSpan(2),
        ];
    }

    public function getHeaderWidgets(): array
    {
        return [
            VisitChart::class,
        ];
    }
}
