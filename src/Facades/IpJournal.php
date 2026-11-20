<?php

namespace EddysStudio\IpJournal\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \EddysStudio\IpJournal\IpJournal
 */
class IpJournal extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \EddysStudio\IpJournal\IpJournal::class;
    }
}
