<?php

declare(strict_types=1);

namespace App\SectionApp\TodoContainer\Http\Controllers;

use App\SectionApp\TodoContainer\Actions\CreateTodoAction;
use App\SectionApp\TodoContainer\Actions\DeleteTodoAction;
use App\SectionApp\TodoContainer\Actions\Interfaces\GetTodoActionInterface;
use App\SectionApp\TodoContainer\Actions\Interfaces\GetTodosActionInterface;
use App\SectionApp\TodoContainer\Actions\Interfaces\UpdateTodoActionInterface;
use App\SectionApp\TodoContainer\Values\CreateTodoValue;
use App\SectionApp\TodoContainer\Values\UpdateTodoValue;
use App\Ship\Http\Controllers\BaseController;
use Illuminate\Http\JsonResponse;

/**
 * Class TodoController
 *
 * This class responsible for handling requests related to the todo
 */
class TodoController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(
        GetTodosActionInterface $getTodosAction
    ): JsonResponse {
        $todos = $getTodosAction->handle();
        return $this->responseSuccess($todos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        CreateTodoAction $createTodoAction,
        CreateTodoValue $todo
    ): JsonResponse {
        $createTodoAction->handle($todo);
        return $this->responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(
        GetTodoActionInterface $getTodoAction,
        int $id
    ): JsonResponse {
        return $this->responseSuccess($getTodoAction->handle($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateTodoActionInterface $updateTodoAction,
        UpdateTodoValue $todo,
        int $id
    ): JsonResponse {
        $updateTodoAction->handle($todo, $id);
        return $this->responseSuccess();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(
        DeleteTodoAction $deleteTodoAction,
        int $id
    ): JsonResponse {
        $deleteTodoAction->handle($id);
        return $this->responseSuccess();
    }
}
