<?php

declare(strict_types=1);

namespace App\Ship\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

/**
 * Class Kernel
 *
 * This class serves as the base console kernel for the application.
 */
class Kernel extends ConsoleKernel
{
    public const OVERLAPPING_CACHE_TIMEOUT = 10; // minutes

    /**
     * Define the application's command schedule.
     *
     * phpcs:disable SlevomatCodingStandard.Functions.UnusedParameter.UnusedParameter
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('horizon:snapshot')->everyMinute()->onOneServer()->withoutOverlapping(self::OVERLAPPING_CACHE_TIMEOUT);
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
