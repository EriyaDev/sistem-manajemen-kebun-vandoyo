<?php

namespace App\Filament\Resources\GardenChemicals;

use App\Filament\Resources\GardenChemicals\Pages\CreateGardenChemical;
use App\Filament\Resources\GardenChemicals\Pages\EditGardenChemical;
use App\Filament\Resources\GardenChemicals\Pages\ListGardenChemicals;
use App\Filament\Resources\GardenChemicals\Pages\ViewGardenChemical;
use App\Filament\Resources\GardenChemicals\Schemas\GardenChemicalForm;
use App\Filament\Resources\GardenChemicals\Schemas\GardenChemicalInfolist;
use App\Filament\Resources\GardenChemicals\Tables\GardenChemicalsTable;
use App\Models\GardenChemical;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class GardenChemicalResource extends Resource
{
    protected static ?string $model = GardenChemical::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::Beaker;

    protected static string | UnitEnum | null $navigationGroup = 'Data Master';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return 'Obat';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Obat';
    }

    public static function form(Schema $schema): Schema
    {
        return GardenChemicalForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return GardenChemicalInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GardenChemicalsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGardenChemicals::route('/'),
            'create' => CreateGardenChemical::route('/create'),
            'view' => ViewGardenChemical::route('/{record}'),
            'edit' => EditGardenChemical::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
