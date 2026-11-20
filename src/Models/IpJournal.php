<?php
namespace EddysStudio\IpJournal\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IpJournal extends Model
{
    protected $table = 'ipjournal';

    protected $fillable = [
        'ip',
        'url',
        'count',
        'agent',
    ];

    protected $casts = [
        'count' => 'integer',
    ];
}
