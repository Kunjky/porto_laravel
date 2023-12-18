<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Actions;

use App\SectionApp\TodoContainer\Actions\Interfaces\DeleteTodoActionInterface;
use App\SectionApp\TodoContainer\Tasks\DeleteTodoTask;

/**
 * Class DeleteTodoAction
 *
 * This class responsible for getting a todo
 */
class DeleteTodoAction implements DeleteTodoActionInterface
{
    /**
     * Constructor
     */
    public function __construct(
        private DeleteTodoTask $deleteTodoTask
    ) {
    }

    /**
     * Delete a todo
     */
    public function handle(int $id): void
    {
        $this->deleteTodoTask->handle($id);
    }
}
