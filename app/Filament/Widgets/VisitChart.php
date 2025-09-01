<?php

namespace App\Filament\Widgets;

use App\Models\Visit;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VisitChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pengunjung Harian';
    protected static ?int $sort = 1; // urutan tampil di dashboard

    protected function getData(): array
    {
        // Ambil 7 hari terakhir
        $data = Visit::select('tanggal', DB::raw('COUNT(DISTINCT ip_address) as jumlah'))
            ->where('tanggal', '>=', now()->subDays(6)) // 7 hari ke belakang
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        // Buat array tanggal harian (meskipun 0 pengunjung)
        $allDays = collect();
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $allDays->put($date, 0);
        }

        // Masukkan data aktual ke array tanggal
        foreach ($data as $row) {
            $allDays[$row->tanggal] = $row->jumlah;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pengunjung',
                    'data' => $allDays->values(),
                ],
            ],
            'labels' => $allDays->keys()->map(fn($d) => Carbon::parse($d)->translatedFormat('d M')),
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // atau 'line'
    }
}
