<?php

namespace EddysStudio\IpJournal;

use Filament\Contracts\Plugin;  
use Filament\Panel;
use EddysStudio\IpJournal\Filament\Resources\IpJournals\IpJournalResource;

class IpJournal implements Plugin{
    public function getId(): string
    {
        return 'ip-journal';
    }

    public function register(Panel $panel): void
    {
        $panel->resources([
            IpJournalResource::class,
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }
}
