<?php

declare(strict_types=1);

namespace App\Ship\Traits;

use Illuminate\Support\Facades\Log;

trait MessageLogHelper
{
    /**
     * Log the message to console output and log file.
     */
    protected function log(string $message): void
    {
        $this->info($message);
        Log::info($message);
    }
}
