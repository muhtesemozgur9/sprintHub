<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\{MockDataController,TaskController};

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/mock-one', [MockDataController::class, 'fetchAndStoreMockOne']);
Route::get('/tasks', [TaskController::class, 'index']);

