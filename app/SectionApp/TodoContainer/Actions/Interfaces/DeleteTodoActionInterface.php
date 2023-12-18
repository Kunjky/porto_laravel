<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Actions\Interfaces;

interface DeleteTodoActionInterface
{
    /**
     * Gets a todo
     */
    public function handle(int $id): void;
}
