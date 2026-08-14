<?php

namespace App\Filament\Widgets;

use App\Models\Orchard;
use App\Models\Worker;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatWidget extends StatsOverviewWidget
{
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        $totalOrchard = Orchard::count();
        $totalWorker = Worker::count();

        return [
            Stat::make('Total Kebun', $totalOrchard),
            Stat::make('Total Pekerja', $totalWorker),
// Stat::make('Unique views', '192K')
//     ->description('13% increase')
//     ->descriptionIcon('heroicon-o-trending-up')
//     ->color('success'),
// Stat::make('Bounce rate', '21%'),
// Stat::make('Average time on page', '3:12'),
        ];
    }
}
