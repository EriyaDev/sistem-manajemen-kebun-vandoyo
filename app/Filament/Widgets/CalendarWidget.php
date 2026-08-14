<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use Guava\Calendar\Filament\CalendarWidget as FilamentCalendarWidget;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Guava\Calendar\ValueObjects\FetchInfo;
use Illuminate\Support\Collection;

class CalendarWidget extends  FilamentCalendarWidget
{
    protected string $view = 'filament.widgets.calendar-widget';

    protected function getEvents(FetchInfo $info): Collection|array
    {
        return [
            CalendarEvent::make()
                ->title('My first event')
                ->start(now())
                ->end(now()->addHours(2)),
        ];
    }
}
