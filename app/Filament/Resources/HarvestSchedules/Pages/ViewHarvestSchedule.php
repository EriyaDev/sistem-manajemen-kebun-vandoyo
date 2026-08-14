<?php

namespace App\Filament\Resources\HarvestSchedules\Pages;

use App\Filament\Resources\HarvestSchedules\HarvestScheduleResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewHarvestSchedule extends ViewRecord
{
    protected static string $resource = HarvestScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
