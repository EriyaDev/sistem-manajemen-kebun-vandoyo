<?php

namespace App\Filament\Resources\SpraySchedules\RelationManagers;

use Filament\Actions\AssociateAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DissociateAction;
use Filament\Actions\DissociateBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SprayScheduleGardenChemicalsRelationManager extends RelationManager
{
    protected static string $relationship = 'spray_schedule_garden_chemicals';

    public static function getModelLabel(): string
    {
        return 'Obat';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Obat';
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('garden_chemical_id')
                    ->label('Obat')
                    ->relationship('garden_chemical', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('dose')
                    ->label('Dosis')
                    ->required()
                    ->numeric(),
                TextInput::make('unit')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('garden_chemical.name')
                    ->label('Obat')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('dose')
                ->label('Dosis')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('unit')
                ->label('Unit')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
