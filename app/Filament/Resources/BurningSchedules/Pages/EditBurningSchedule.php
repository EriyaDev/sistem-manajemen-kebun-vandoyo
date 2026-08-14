<?php

namespace App\Filament\Resources\BurningSchedules\Pages;

use App\Filament\Resources\BurningSchedules\BurningScheduleResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditBurningSchedule extends EditRecord
{
    protected static string $resource = BurningScheduleResource::class;

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
