<?php

namespace App\Filament\Resources\BurningSchedules\Pages;

use App\Filament\Resources\BurningSchedules\BurningScheduleResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewBurningSchedule extends ViewRecord
{
    protected static string $resource = BurningScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
