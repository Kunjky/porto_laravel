<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Tasks;

use App\SectionApp\TodoContainer\Repositories\Interfaces\TodoRepositoryInterface;
use App\SectionApp\TodoContainer\Values\TodoValue;
use Spatie\LaravelData\DataCollection;

/**
 * Class GetTodosTask
 *
 * This class is responsible for getting todos
 */
class GetTodosTask
{
    /**
     * Class constructor
     */
    public function __construct(protected TodoRepositoryInterface $todoRepository)
    {
    }

    /**
     * Handle the task.
     *
     * @return DataCollection<int, TodoValue>
     */
    public function handle(): DataCollection
    {
        return $this->todoRepository->getTodos();
    }
}
