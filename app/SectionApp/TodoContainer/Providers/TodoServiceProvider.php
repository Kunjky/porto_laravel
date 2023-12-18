<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Providers;

use App\SectionApp\TodoContainer\Actions\CreateTodoAction;
use App\SectionApp\TodoContainer\Actions\DeleteTodoAction;
use App\SectionApp\TodoContainer\Actions\GetTodoAction;
use App\SectionApp\TodoContainer\Actions\GetTodosAction;
use App\SectionApp\TodoContainer\Actions\Interfaces\CreateTodoActionInterface;
use App\SectionApp\TodoContainer\Actions\Interfaces\DeleteTodoActionInterface;
use App\SectionApp\TodoContainer\Actions\Interfaces\GetTodoActionInterface;
use App\SectionApp\TodoContainer\Actions\Interfaces\GetTodosActionInterface;
use App\SectionApp\TodoContainer\Actions\Interfaces\UpdateTodoActionInterface;
use App\SectionApp\TodoContainer\Actions\UpdateTodoAction;
use App\SectionApp\TodoContainer\Repositories\Interfaces\TodoRepositoryInterface;
use App\SectionApp\TodoContainer\Repositories\TodoRepository;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class TodoServiceProvider
 *
 * This class is responsible for registering event listeners and subscribers.
 */
class TodoServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register(): void
    {
        parent::register();
        $this->app->register(RouteServiceProvider::class);

        // Actions
        $this->app->bind(CreateTodoActionInterface::class, CreateTodoAction::class);
        $this->app->bind(UpdateTodoActionInterface::class, UpdateTodoAction::class);
        $this->app->bind(DeleteTodoActionInterface::class, DeleteTodoAction::class);
        $this->app->bind(GetTodosActionInterface::class, GetTodosAction::class);
        $this->app->bind(GetTodoActionInterface::class, GetTodoAction::class);

        // Repositories
        $this->app->bind(TodoRepositoryInterface::class, TodoRepository::class);
    }
}
