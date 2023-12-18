<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Actions\Interfaces;

use App\SectionApp\TodoContainer\Values\TodoValue;

interface GetTodoActionInterface
{
    /**
     * Gets a todo
     */
    public function handle(int $id): TodoValue;
}
