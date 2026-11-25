<?php

use Illuminate\Support\Facades\Route;

beforeEach(function () {
    $this->withoutExceptionHandling();
    Route::get('/test-ipjournal', fn () => 'ok')
        ->middleware(\EddysStudio\IpJournal\Http\Middleware\VisitsLog::class);
});

it('records a new visit in the database', function () {
    $this->withServerVariables(['REMOTE_ADDR' => '192.168.1.10'])
        ->withHeaders(['User-Agent' => 'Mozilla/5.0 Test'])
        ->get('/test-ipjournal')
        ->assertOk()
        ->assertSee('ok');

    $this->assertDatabaseHas('ipjournal', [
        'ip' => '192.168.1.10',
        'url' => url('/test-ipjournal'),
        'count' => 1,
        'agent' => 'Mozilla/5.0 Test',
    ]);
});

it('increments the counter upon a repeat visit from the same IP address', function () {
    $server = ['REMOTE_ADDR' => '192.168.1.10'];

    $this->withServerVariables($server)->get('/test-ipjournal');
    $this->withServerVariables($server)->get('/test-ipjournal');

    $this->assertDatabaseCount('ipjournal', 1);
    $this->assertDatabaseHas('ipjournal', [
        'ip' => '192.168.1.10',
        'url' => url('/test-ipjournal'),
        'count' => 2,
    ]);
});