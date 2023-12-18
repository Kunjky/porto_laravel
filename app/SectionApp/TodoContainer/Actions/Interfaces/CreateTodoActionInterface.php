<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Actions\Interfaces;

use App\SectionApp\TodoContainer\Values\CreateTodoValue;

interface CreateTodoActionInterface
{
    /**
     * Creates a new todo
     */
    public function handle(CreateTodoValue $todo): void;
}
