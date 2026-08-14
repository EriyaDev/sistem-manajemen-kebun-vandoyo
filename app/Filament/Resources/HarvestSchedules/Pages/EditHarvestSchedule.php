<?php

namespace App\Filament\Resources\HarvestSchedules\Pages;

use App\Filament\Resources\HarvestSchedules\HarvestScheduleResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditHarvestSchedule extends EditRecord
{
    protected static string $resource = HarvestScheduleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
