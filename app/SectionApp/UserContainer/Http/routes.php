<?php

declare(strict_types=1);

use App\SectionApp\UserContainer\Http\Controllers\AuthController;

Route::group(['prefix' => 'v1'], function (): void {
    Route::controller(AuthController::class)->group(function (): void {
        Route::post('register', 'register');
        Route::post('login', 'login');
    });
    Route::get('user', fn () => request()->user())->middleware('auth:api');
});
