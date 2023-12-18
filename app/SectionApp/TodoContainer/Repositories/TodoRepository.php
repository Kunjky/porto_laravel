<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Repositories;

use App\SectionApp\TodoContainer\Models\Todo;
use App\SectionApp\TodoContainer\Repositories\Interfaces\TodoRepositoryInterface;
use App\SectionApp\TodoContainer\Values\TodoValue;
use Spatie\LaravelData\DataCollection;

/**
 * Class TodoRepository
 *
 * This class is responsible for interacting with the todo model.
 */
class TodoRepository implements TodoRepositoryInterface
{
    /**
     * Gets a list of todos.
     *
     * @return DataCollection<int, TodoValue>
     */
    public function getTodos(): DataCollection
    {
        return TodoValue::collection(
            Todo::all()
        );
    }

    /**
     * Creates a new todo.
     *
     * @param array<string, scalar> $data
     */
    public function create(array $data): void
    {
        Todo::create($data);
    }

    /**
     * Update an existed todo.
     *
     * @param array<string, scalar> $data
     */
    public function update(array $data, int $id): void
    {
        $todo = Todo::findOrFail($id);

        $todo->update($data);
    }

    /**
     * Get todo by id
     */
    public function getTodoById(int $id): TodoValue
    {
        return TodoValue::from(
            Todo::findOrFail($id)
        );
    }

    /**
     * Get todo by id
     */
    public function delete(int $id): void
    {
        $todo = Todo::findOrFail($id);

        $todo->delete();
    }
}
