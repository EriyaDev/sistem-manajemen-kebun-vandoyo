<?php

namespace App\Filament\Resources\GardenChemicals\Pages;

use App\Filament\Resources\GardenChemicals\GardenChemicalResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewGardenChemical extends ViewRecord
{
    protected static string $resource = GardenChemicalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
