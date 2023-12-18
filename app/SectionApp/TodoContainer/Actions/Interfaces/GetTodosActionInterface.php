<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Actions\Interfaces;

use App\SectionApp\TodoContainer\Values\TodoValue;
use Spatie\LaravelData\DataCollection;

interface GetTodosActionInterface
{
    /**
     * Get a list of todo
     *
     * @return DataCollection<int, TodoValue>
     */
    public function handle(): DataCollection;
}
