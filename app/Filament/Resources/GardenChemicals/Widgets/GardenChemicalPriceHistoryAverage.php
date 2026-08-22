<?php

namespace App\Filament\Resources\GardenChemicals\Widgets;

use App\Models\GardenChemicalPriceHistory;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class GardenChemicalPriceHistoryAverage extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        // 1. Kelompokkan data harga obat per bulan
        // 2. Hitung rata-rata harga obat per bulan
        // 3. Masukkan ke array chart
        $chartData = GardenChemicalPriceHistory::query()
            ->whereNotNull('date')
            ->orderBy('date', 'asc')
            ->get()
            ->groupBy(fn ($item) => Carbon::parse($item->date)->format('Y-m'))
            ->map(function ($monthHistories) {
                return (int) round($monthHistories->avg('price') ?? 0);
            })
            ->values()
            ->toArray();

        $color = 'success';
        $desc = 'Harga obat masih stabil';
        $count = count($chartData);
        if ($count >= 2) {
            $latest = $chartData[$count - 1];
            $previous = $chartData[$count - 2];
            $color = $latest > $previous ? 'warning' : 'success';
            $desc = $latest > $previous ? 'Harga obat mengalami kenaikan harga dari bulan sebelumnya' : 'Harga obat mengalami penurunan harga dari bulan sebelumnya';
        }

        return [
            Stat::make('Harga Rata-rata', fn() => 'Rp. ' . number_format(GardenChemicalPriceHistory::price_average() ?? 0, 0, ',', '.'))
                ->description($desc)
                ->descriptionIcon($color === 'warning' ? 'heroicon-o-arrow-up' : 'heroicon-o-arrow-down')
                ->color($color)
                ->chart(empty($chartData) ? [0] : $chartData)
        ];
    }
}

