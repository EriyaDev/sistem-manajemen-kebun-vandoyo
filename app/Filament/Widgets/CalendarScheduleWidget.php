<?php

namespace App\Filament\Widgets;

use App\Models\BurningSchedule;
use App\Models\HarvestSchedule;
use App\Models\SpraySchedule;
use Filament\Support\Colors\Color;
use Guava\Calendar\Filament\CalendarWidget;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Guava\Calendar\ValueObjects\FetchInfo;
use Illuminate\Support\Collection;

class CalendarScheduleWidget extends CalendarWidget
{
    protected static ?int $sort = 3;
    protected function getEvents(FetchInfo $info): Collection|array
    {
        $burningSchedules = BurningSchedule::with('orchard')->get();
        $harvestSchedules = HarvestSchedule::with('orchard')->get();
        $spraySchedules = SpraySchedule::with('orchard')->get();

        $events = [];

        foreach ($burningSchedules as $s) {
            $events[] = CalendarEvent::make($s)
                ->title('Bakar - ' . $s->orchard->name)
                ->start($s->start_date)
                ->end($s->end_date ?? $s->start_date)
                ->backgroundColor(Color::Red[600]); 
        }

        foreach ($harvestSchedules as $s) {
            $events[] = CalendarEvent::make($s)
                ->title('Panen - ' . $s->orchard->name)
                ->start($s->start_date)
                ->end($s->end_date ?? $s->start_date);
        }

        foreach ($spraySchedules as $s) {
            $events[] = CalendarEvent::make($s)
                ->title('Semprot - ' . $s->orchard->name)
                ->start($s->start_date)
                ->end($s->end_date ?? $s->start_date)
                ->backgroundColor(Color::Green[600]);
        }

        return $events;
    }
}
