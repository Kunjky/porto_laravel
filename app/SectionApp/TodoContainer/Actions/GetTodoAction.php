<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Actions;

use App\SectionApp\TodoContainer\Actions\Interfaces\GetTodoActionInterface;
use App\SectionApp\TodoContainer\Tasks\GetTodoByIdTask;
use App\SectionApp\TodoContainer\Values\TodoValue;

/**
 * Class GetTodoAction
 *
 * This class responsible for getting a todo
 */
class GetTodoAction implements GetTodoActionInterface
{
    /**
     * Constructor
     */
    public function __construct(
        private GetTodoByIdTask $getTodoByIdTask
    ) {
    }

    /**
     * Get a list of todo
     */
    public function handle(int $id): TodoValue
    {
        return $this->getTodoByIdTask->handle($id);
    }
}
