<?php

declare(strict_types=1);

namespace App\Ship\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\PreventRequestsDuringMaintenance as Middleware;

/**
 * Class PreventRequestsDuringMaintenance
 *
 * This class handles preventing requests during maintenance mode.
 */
class PreventRequestsDuringMaintenance extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array<int, string>
     */
    protected $except = [
    ];
}
