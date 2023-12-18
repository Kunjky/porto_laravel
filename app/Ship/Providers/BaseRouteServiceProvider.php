<?php

declare(strict_types=1);

namespace App\Ship\Providers;

use Illuminate\Support\Facades\Route;

/**
 * Class BaseRouteServiceProvider
 *
 * This class handle define route for api app and crm
 */
class BaseRouteServiceProvider extends RouteServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = null;

    /**
     * This routePath defines api routes.
     *
     * @var string
     */
    protected $routePath = null;

    /**
     * This prefix defines api routes.
     *
     * @var string
     */
    protected $prefix = null;

    /**
     * Define middleware for routes
     *
     * @var string
     */
    protected $middleware = null;

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        $this->registerGlobalValidationRules();

        $this->routes(function (): void {
            Route::middleware($this->middleware)
                ->namespace($this->namespace)
                ->prefix($this->prefix)
                ->group($this->routePath);
        });
    }

    /**
     * Define the global validation rules for route parameters
     */
    protected function registerGlobalValidationRules(): void
    {
        // The user id must be numerical
        Route::pattern('userId', '[0-9]+');
        Route::pattern('id', '[0-9]+');
    }
}
