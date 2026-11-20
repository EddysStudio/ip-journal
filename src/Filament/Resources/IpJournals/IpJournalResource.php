<?php

namespace EddysStudio\IpJournal\Filament\Resources\IpJournals;

use EddysStudio\IpJournal\Filament\Resources\IpJournals\Pages\CreateIpJournal;
use EddysStudio\IpJournal\Filament\Resources\IpJournals\Pages\EditIpJournal;
use EddysStudio\IpJournal\Filament\Resources\IpJournals\Pages\ListIpJournals;
use EddysStudio\IpJournal\Filament\Resources\IpJournals\Schemas\IpJournalForm;
use EddysStudio\IpJournal\Filament\Resources\IpJournals\Tables\IpJournalsTable;
use EddysStudio\IpJournal\Models\IpJournal;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class IpJournalResource extends Resource
{
    //protected static ?string $model = IpJournal::class;
    protected static ?string $model = \EddysStudio\IpJournal\Models\IpJournal::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Visit\'s log';
    protected static ?string $navigationLabel = 'Visit\'s log';

    public static function form(Schema $schema): Schema
    {
        return IpJournalForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return IpJournalsTable::configure($table);
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
            'index' => ListIpJournals::route('/'),
            'create' => CreateIpJournal::route('/create'),
            'edit' => EditIpJournal::route('/{record}/detail'),
        ];
    }
}
