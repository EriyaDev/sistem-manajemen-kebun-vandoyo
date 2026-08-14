<?php

namespace App\Filament\Resources\Orchards\Pages;

use App\Filament\Resources\Orchards\OrchardResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListOrchards extends ListRecords
{
    protected static string $resource = OrchardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
