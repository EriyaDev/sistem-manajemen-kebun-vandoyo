<?php

namespace App\Filament\Resources\GardenChemicals\Widgets;

use App\Models\GardenChemicalPriceHistory;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class GardenChemicalPriceHistoryAverage extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Harga Rata-rata', fn()=>'Rp. '.number_format(GardenChemicalPriceHistory::price_average(),0,',','.'))
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success')
        ];
    }
}
