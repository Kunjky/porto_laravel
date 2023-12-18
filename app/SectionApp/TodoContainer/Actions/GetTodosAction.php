<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Actions;

use App\SectionApp\TodoContainer\Actions\Interfaces\GetTodosActionInterface;
use App\SectionApp\TodoContainer\Tasks\GetTodosTask;
use App\SectionApp\TodoContainer\Values\TodoValue;
use Spatie\LaravelData\DataCollection;

/**
 * Class GetTodosAction
 *
 * This class responsible for getting todos
 */
class GetTodosAction implements GetTodosActionInterface
{
    /**
     * Constructor
     */
    public function __construct(
        private GetTodosTask $getTodosTask
    ) {
    }

    /**
     * Get a list of todo
     *
     * @return DataCollection<int, TodoValue>
     */
    public function handle(): DataCollection
    {
        return $this->getTodosTask->handle();
    }
}
