<?php

namespace App\Filament\Resources\SpraySchedules\Schemas;

use App\Models\SpraySchedule;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class SprayScheduleInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('orchard.name')
                    ->label('Orchard'),
                TextEntry::make('start_date')
                    ->date(),
                TextEntry::make('end_date')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('status'),
                TextEntry::make('notes')
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (SpraySchedule $record): bool => $record->trashed()),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
