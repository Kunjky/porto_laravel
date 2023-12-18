<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Repositories\Interfaces;

use App\SectionApp\TodoContainer\Values\TodoValue;
use Spatie\LaravelData\DataCollection;

interface TodoRepositoryInterface
{
    /**
     * Gets a list of todos.
     *
     * @return DataCollection<int, TodoValue>
     */
    public function getTodos(): DataCollection;

    /**
     * Creates a new todo.
     *
     * @param array<string, scalar> $data
     */
    public function create(array $data): void;

    /**
     * Update an existed todo.
     *
     * @param array<string, scalar> $data
     */
    public function update(array $data, int $id): void;

    /**
     * Get todo by id
     */
    public function getTodoById(int $id): TodoValue;

    /**
     * Get todo by id
     */
    public function delete(int $id): void;
}
