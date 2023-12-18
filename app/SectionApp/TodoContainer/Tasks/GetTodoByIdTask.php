<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Tasks;

use App\SectionApp\TodoContainer\Repositories\Interfaces\TodoRepositoryInterface;
use App\SectionApp\TodoContainer\Values\TodoValue;

/**
 * Class GetTodoByIdTask
 *
 * This class is responsible for getting a todo
 */
class GetTodoByIdTask
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
    public function handle(int $id): TodoValue
    {
        return $this->todoRepository->getTodoById($id);
    }
}
