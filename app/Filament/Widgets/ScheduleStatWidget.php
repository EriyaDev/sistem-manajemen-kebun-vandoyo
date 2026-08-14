<?php

namespace App\Filament\Widgets;

use App\Models\BurningSchedule;
use App\Models\HarvestSchedule;
use App\Models\SpraySchedule;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ScheduleStatWidget extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $upcomingBurningSchedule = BurningSchedule::where('start_date', '>=', Carbon::now())->first();
        $upcomingSpraySchedule = SpraySchedule::where('start_date', '>=', Carbon::now())->first();
        $upcomingHarvestSchedule = HarvestSchedule::where('start_date', '>=', Carbon::now())->first();

        return [
            Stat::make('Jadwal Bakar Berikutnya', $upcomingBurningSchedule?->start_date?->translatedFormat('D, d F Y') ?? 'Tidak ada jadwal')
                ->description('Minggu ke -' . $upcomingBurningSchedule?->start_date?->format('W') ?? ''),
            Stat::make('Jadwal Semprot Berikutnya', $upcomingSpraySchedule?->start_date?->translatedFormat('D, d F Y') ?? 'Tidak ada jadwal')
                ->description('Minggu ke -' . $upcomingSpraySchedule?->start_date?->format('W') ?? ''),
            Stat::make('Jadwal Panen Berikutnya', $upcomingHarvestSchedule?->start_date?->translatedFormat('D, d F Y') ?? 'Tidak ada jadwal')
                ->description('Minggu ke -' . $upcomingHarvestSchedule?->start_date?->format('W') ?? ''),
        ];
    }
}
