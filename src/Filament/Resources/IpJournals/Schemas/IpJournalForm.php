<?php

namespace EddysStudio\IpJournal\Filament\Resources\IpJournals\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class IpJournalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('ip')
                    ->disabledOn('edit')
                    ->required(),
                TextInput::make('url')
                    ->url()
                    ->disabledOn('edit')
                    ->required(),
                TextInput::make('count')
                    ->required()
                    ->numeric()
                    ->disabledOn('edit')
                    ->default(1),
                Textarea::make('agent')
                    ->disabledOn('edit')
                    ->columnSpanFull(),
            ]);
    }
}
