<?php

namespace App\Filament\Resources\Orchards\Pages;

use App\Filament\Resources\Orchards\OrchardResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewOrchard extends ViewRecord
{
    protected static string $resource = OrchardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
