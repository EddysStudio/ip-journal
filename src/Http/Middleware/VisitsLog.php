<?php

namespace EddysStudio\IpJournal\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use EddysStudio\IpJournal\Models\IpJournal;
use Symfony\Component\HttpFoundation\Response;

class VisitsLog
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($this->shouldSkip($request)) {
            return $next($request);
        }

        $ip  = $request->ip();
        $url = $request->fullUrl();
        $agent = $request->userAgent();

        $entry = IpJournal::firstOrNew([
            'ip'  => $ip,
            'url' => $url,
        ]);

        $entry->agent = $agent;

        if ($entry->exists) {
            $entry->count = $entry->count + 1;
        } else {
            $entry->count = 1;
        }

        $entry->save();

        return $next($request);
    }

    protected function shouldSkip(Request $request): bool
    {
        return $request->is('livewire/*')
            || $request->is('filament/*')
            || ($request->ajax() && $request->is('admin/*')); // при желании можно убрать
    }
}