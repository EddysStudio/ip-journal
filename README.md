# Visit's log (IP — Journal)

This package is a middleware plugin for the Filament Laravel admin panel, designed to log site visits. It stores the visitor's IP address, user agent, the URL visited, and the number of requests made to that URL by the visitor in a database. The stored data can be viewed in a dedicated section within the admin panel's sidebar.

## Requirements

- PHP 8.2 or higher
- Laravel 12
- Filament 4.x

## Installation

1. Install the package via Composer:

```bash
composer require eddysstudio/ip-journal
```

2. Run the following artisan command in your project directory:
```bash
    php artisan migrate
```

3. Finally, register the plugin in your Filament panel provider (usually /app/Providers/Filament/AdminPanelProvider.php) :
```php
    ->plugin(new \EddysStudio\IpJournal\IpJournal())
```
and register the middleware in /bootstrap/app.php :
```php
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            'log.ip', 
        ]);
    })
```
and if you need to log visits to the administrator section, also in your Filament panel provider:
```php 
use EddysStudio\IpJournal\Http\Middleware\VisitsLog;
..
 ->middleware([
        ..
        VisitsLog::class,
    ])
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
