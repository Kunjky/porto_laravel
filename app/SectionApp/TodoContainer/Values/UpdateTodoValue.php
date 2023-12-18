<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Values;

use App\Ship\Definitions\Todo\Priority;
use App\Ship\Definitions\Todo\Status;
use App\Ship\Values\BaseValue;
use Spatie\LaravelData\Attributes\Validation\AfterOrEqual;
use Spatie\LaravelData\Attributes\Validation\Date;
use Spatie\LaravelData\Attributes\Validation\Max;

/**
 * UpdateTodo representation
 */
class UpdateTodoValue extends BaseValue
{
    /**
     * Class constructor
     */
    public function __construct(
        #[Max(255)]
        public ?string $task_name,
        #[Date]
        public ?string $start_date,
        #[Date,
            AfterOrEqual('start_date')]
        public ?string $end_date,
        public ?Priority $priority,
        public ?Status $status,
    ) {
    }
}
