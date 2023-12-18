<?php

declare(strict_types=1);

namespace App\Ship\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

/**
 * Class Authenticate
 *
 * This class handles authentication for the application.
 */
class Authenticate extends Middleware
{
    // phpcs:disable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return null;
    }
}
