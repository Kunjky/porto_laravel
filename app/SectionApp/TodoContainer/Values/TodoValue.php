<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Values;

use App\Ship\Definitions\Todo\Priority;
use App\Ship\Definitions\Todo\Status;
use App\Ship\Values\BaseValue;

/**
 * Todo representation
 */
class TodoValue extends BaseValue
{
    /**
     * Class constructor
     */
    public function __construct(
        public int $id,
        public string $task_name,
        public string $start_date,
        public string $end_date,
        public Priority $priority,
        public Status $status,
    ) {
    }
}
