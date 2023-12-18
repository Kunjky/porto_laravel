<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Tasks;

use App\SectionApp\TodoContainer\Repositories\Interfaces\TodoRepositoryInterface;
use App\SectionApp\TodoContainer\Values\UpdateTodoValue;

/**
 * Class UpdateTodoTask
 *
 * This class is responsible for updating a todo
 */
class UpdateTodoTask
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
    public function handle(UpdateTodoValue $todo, int $id): void
    {
        $data = array_filter([
            'task_name' => $todo->task_name,
            'start_date' => $todo->start_date,
            'end_date' => $todo->end_date,
            'priority' => $todo->priority?->value,
            'status' => $todo->status?->value,
        ], fn ($field) => $field !== null);

        $this->todoRepository->update($data, $id);
    }
}
