<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Actions\Interfaces;

use App\SectionApp\TodoContainer\Values\UpdateTodoValue;

interface UpdateTodoActionInterface
{
    /**
     * Updates a todo
     */
    public function handle(UpdateTodoValue $todo, int $id): void;
}
