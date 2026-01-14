<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\VideoPostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::controller(NewsController::class)
    ->prefix('news')
    ->group(function () {
        Route::post('', 'create');
        Route::get('{id}', 'get')->whereNumber('id');
    });

Route::controller(VideoPostController::class)
    ->prefix('video-posts')
    ->group(function () {
        Route::post('', 'create');
        Route::get('{id}', 'get')->whereNumber('id');
    });

Route::controller(CommentController::class)
    ->prefix('comments')
    ->group(function () {
        Route::middleware('auth:sanctum')->group(function () {
            Route::post('', 'create');
            Route::delete('{id}', 'delete')->whereNumber('id');
            Route::put('{id}', 'update')->whereNumber('id');
        });

        Route::get('{id}', 'get')->whereNumber('id');
    });

Route::post('/login', [AuthController::class, 'login']);
