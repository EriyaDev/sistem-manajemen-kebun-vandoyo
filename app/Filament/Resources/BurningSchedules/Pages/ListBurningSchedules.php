<?php

namespace App\Filament\Resources\BurningSchedules\Pages;

use App\Filament\Resources\BurningSchedules\BurningScheduleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBurningSchedules extends ListRecords
{
    protected static string $resource = BurningScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
