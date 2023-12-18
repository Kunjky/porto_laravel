<?php

declare(strict_types=1);

namespace App\SectionApp\UserContainer\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class UserServiceProvider
 *
 * This class is responsible for registering event listeners and subscribers.
 */
class UserServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register(): void
    {
        parent::register();
        $this->app->register(RouteServiceProvider::class);
    }
}
