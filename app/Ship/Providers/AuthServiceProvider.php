<?php

declare(strict_types=1);

namespace App\Ship\Providers;

use App\Ship\Library\JWTService;
use App\Ship\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class AuthServiceProvider
 *
 * This service provider is responsible for registering authentication-related services and configurations.
 */
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Auth::viaRequest('jwt', function (Request $request) {
            $token = $request->bearerToken();

            if (empty($token)) {
                return null;
            }

            $data = app(JWTService::class)->verify($token);

            return User::where('email', $data['sub'] ?? null)->first();
        });
    }
}
