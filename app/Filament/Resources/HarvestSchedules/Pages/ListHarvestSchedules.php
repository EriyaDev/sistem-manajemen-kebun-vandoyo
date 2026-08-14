<?php

namespace App\Filament\Resources\HarvestSchedules\Pages;

use App\Filament\Resources\HarvestSchedules\HarvestScheduleResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListHarvestSchedules extends ListRecords
{
    protected static string $resource = HarvestScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
