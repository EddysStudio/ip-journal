<?php

namespace EddysStudio\IpJournal\Filament\Resources\IpJournals\Pages;

use EddysStudio\IpJournal\Filament\Resources\IpJournals\IpJournalResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;
use Illuminate\Contracts\Support\Htmlable;

class EditIpJournal extends EditRecord
{
    protected static string $resource = IpJournalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    public function getBreadcrumbs(): array
    {
        return [
            '/admin/ip-journals' => 'Visit\'s log',
            '' => 'Detail',
        ];
    }

    protected function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()->hidden();
    }

    public function getTitle(): string | Htmlable
    {
        return 'Detail Info';
    }
}
