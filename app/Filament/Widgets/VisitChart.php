<?php

namespace App\Filament\Widgets;

use App\Models\Visit;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VisitChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Kunjungan Website';

    protected function getData(): array
    {
        $data = Visit::selectRaw('DATE(created_at) as tanggal, COUNT(*) as jumlah')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('tanggal')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Kunjungan',
                    'data' => $data->pluck('jumlah'),
                ],
            ],
            'labels' => $data->pluck('tanggal')->map(fn($date) => Carbon::parse($date)->translatedFormat('d M')),
        ];
    }

    protected function getType(): string
    {
        return 'bar'; 
    }
}
