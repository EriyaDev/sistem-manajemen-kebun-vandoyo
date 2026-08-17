<?php

namespace App\Filament\Resources\Orchards;

use App\Filament\Resources\Orchards\Pages\CreateOrchard;
use App\Filament\Resources\Orchards\Pages\EditOrchard;
use App\Filament\Resources\Orchards\Pages\ListOrchards;
use App\Filament\Resources\Orchards\Pages\ViewOrchard;
use App\Filament\Resources\Orchards\RelationManagers\OrchardHistoriesRelationManager;
use App\Filament\Resources\Orchards\Schemas\OrchardForm;
use App\Filament\Resources\Orchards\Schemas\OrchardInfolist;
use App\Filament\Resources\Orchards\Tables\OrchardsTable;
use App\Models\Orchard;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use UnitEnum;

class OrchardResource extends Resource
{
    protected static ?string $model = Orchard::class;

    // protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    protected static string | UnitEnum | null $navigationGroup = 'Data Master';

    public static function getModelLabel(): string
    {
        return 'Kebun';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Kebun';
    }

    public static function form(Schema $schema): Schema
    {
        return OrchardForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return OrchardInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return OrchardsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            OrchardHistoriesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListOrchards::route('/'),
            'create' => CreateOrchard::route('/create'),
            'view' => ViewOrchard::route('/{record}'),
            'edit' => EditOrchard::route('/{record}/edit'),
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
