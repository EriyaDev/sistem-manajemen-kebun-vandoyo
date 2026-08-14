<?php

namespace App\Filament\Resources\GardenChemicals\Pages;

use App\Filament\Resources\GardenChemicals\GardenChemicalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListGardenChemicals extends ListRecords
{
    protected static string $resource = GardenChemicalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
