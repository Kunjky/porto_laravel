<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Providers;

use App\Ship\Providers\BaseRouteServiceProvider;

/**
 * Class RouteServiceProvider
 *
 * This class is responsible for registering routes for the application.
 */
class RouteServiceProvider extends BaseRouteServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\SectionApp\TodoContainer\Http\Controllers';

    /**
     * This routePath is defined app routes
     *
     * @var string
     */
    protected $routePath = __DIR__. '/../Http/routes.php';

    /**
     * This prefix defines api app routes.
     *
     * @var string
     */
    protected $prefix = 'api/app';

    /**
     * Define middleware for app routes
     *
     * @var string
     */
    protected $middleware = 'api';
}
