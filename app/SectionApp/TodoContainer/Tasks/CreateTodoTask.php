<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Tasks;

use App\SectionApp\TodoContainer\Repositories\Interfaces\TodoRepositoryInterface;
use App\SectionApp\TodoContainer\Values\CreateTodoValue;

/**
 * Class CreateTodoTask
 *
 * This class is responsible for creating a new todo
 */
class CreateTodoTask
{
    /**
     * Class constructor
     */
    public function __construct(protected TodoRepositoryInterface $todoRepository)
    {
    }

    /**
     * Handle the task.
     */
    public function handle(CreateTodoValue $todo): void
    {
        $data = [
            'task_name' => $todo->task_name,
            'start_date' => $todo->start_date,
            'end_date' => $todo->end_date,
            'priority' => $todo->priority->value,
            'status' => $todo->status->value,
        ];

        $this->todoRepository->create($data);
    }
}
