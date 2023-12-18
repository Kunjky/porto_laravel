<?php

declare(strict_types=1);

Route::group(['prefix' => 'v1'], function (): void {
    Route::apiResource('todos', TodoController::class);
});
