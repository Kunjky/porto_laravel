<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Tasks;

use App\SectionApp\TodoContainer\Repositories\Interfaces\TodoRepositoryInterface;

/**
 * Class DeleteTodoTask
 *
 * This class is responsible for deleting a todo.
 */
class DeleteTodoTask
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
    public function handle(int $id): void
    {
        $this->todoRepository->delete($id);
    }
}
