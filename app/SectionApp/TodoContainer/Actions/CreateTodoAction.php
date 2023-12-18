<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Actions;

use App\SectionApp\TodoContainer\Actions\Interfaces\CreateTodoActionInterface;
use App\SectionApp\TodoContainer\Tasks\CreateTodoTask;
use App\SectionApp\TodoContainer\Values\CreateTodoValue;

/**
 * Class CreateTodoAction
 *
 * This class responsible for creating a new todo
 */
class CreateTodoAction implements CreateTodoActionInterface
{
    /**
     * Constructor
     */
    public function __construct(
        private CreateTodoTask $createTodoTask
    ) {
    }

    /**
     * Handle the task
     */
    public function handle(CreateTodoValue $todo): void
    {
        $this->createTodoTask->handle($todo);
    }
}
