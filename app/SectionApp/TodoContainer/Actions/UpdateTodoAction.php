<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Actions;

use App\SectionApp\TodoContainer\Actions\Interfaces\UpdateTodoActionInterface;
use App\SectionApp\TodoContainer\Tasks\UpdateTodoTask;
use App\SectionApp\TodoContainer\Values\UpdateTodoValue;

/**
 * Class UpdateTodoAction
 *
 * This class responsible for updating a todo
 */
class UpdateTodoAction implements UpdateTodoActionInterface
{
    /**
     * Constructor
     */
    public function __construct(
        private UpdateTodoTask $updateTodoTask
    ) {
    }

    /**
     * Handle the task
     */
    public function handle(UpdateTodoValue $todo, int $id): void
    {
        $this->updateTodoTask->handle($todo, $id);
    }
}
