<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('tasks.index'));
Route::resource('tasks', TaskController::class);
Route::PUT('/tasks/{task}/change-is-done', [TaskController::class, 'change_is_done'])->name('tasks.change_is_done');
