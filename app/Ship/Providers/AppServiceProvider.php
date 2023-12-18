<?php

declare(strict_types=1);

namespace App\Ship\Providers;

use App\Ship\Library\JWTService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 *
 * This service provider is responsible for bootstrapping the application's services.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * All of the container singletons that should be registered.
     *
     * @var array<string, string>
     */
    public $singletons = [
        JWTService::class => JWTService::class,
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (App::environment('local')) {
            DB::listen(function ($query): void {
                File::append(
                    storage_path('/logs/query.log'),
                    '[' . date('Y-m-d H:i:s') . ']' . PHP_EOL . $query->sql . ' [' . implode(', ', $query->bindings) . ']' . PHP_EOL . PHP_EOL
                );
            });
        }
    }
}
