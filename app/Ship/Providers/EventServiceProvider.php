<?php

declare(strict_types=1);

namespace App\Ship\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider
 *
 * This service provider is responsible for registering event listeners and
 * configuring event handling features of the application.
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        // This comment is used to fix EmptyFunction rule
    }

    /**
     * Register the application services.
     */
    public function register(): void
    {
        // This comment is used to fix EmptyFunction rule
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
