<?php

namespace EddysStudio\IpJournal\Filament\Resources\IpJournals\Pages;

use EddysStudio\IpJournal\Filament\Resources\IpJournals\IpJournalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListIpJournals extends ListRecords
{
    protected static string $resource = IpJournalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/ip-journals' => 'Visit\'s log',
            '' => 'List',
        ];
    }

    public function getHeading(): string
    {
        return 'Visit\'s log'; 
    }
}
