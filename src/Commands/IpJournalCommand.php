<?php

namespace EddysStudio\IpJournal\Commands;

use Illuminate\Console\Command;

class IpJournalCommand extends Command
{
    public $signature = 'ip-journal';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
