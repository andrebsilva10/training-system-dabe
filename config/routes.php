<?php

use Core\Routes\Route;

Route::get('/',          [App\Controllers\HomeController::class, 'index']);

Route::get('/register',   [App\Controllers\UsersController::class, 'new']);
Route::post('/register',  [App\Controllers\UsersController::class, 'create']);

Route::get('/login',     [App\Controllers\AuthController::class, 'new']);
Route::post('/login',    [App\Controllers\AuthController::class, 'create']);
Route::get('/logout',    [App\Controllers\AuthController::class, 'destroy']);

Route::get('/profile',   [App\Controllers\ProfileController::class, 'show']);
Route::post('/profile',  [App\Controllers\ProfileController::class, 'updateAvatar']);

Route::get('/trainings',          [App\Controllers\TrainingsController::class, 'index']);
Route::get('/trainings/new',      [App\Controllers\TrainingsController::class, 'new']);
Route::get('/trainings/:id/edit', [App\Controllers\TrainingsController::class, 'edit']);
Route::put('/trainings/:id',      [App\Controllers\TrainingsController::class, 'update']);
Route::post('/trainings',         [App\Controllers\TrainingsController::class, 'create']);
Route::delete('/trainings',       [App\Controllers\TrainingsController::class, 'destroy']);

Route::get('/trainingUser',          [App\Controllers\TrainingUserController::class, 'index']);
Route::get('/trainingUser/show',     [App\Controllers\TrainingUserController::class, 'show']);
Route::get('/trainingUser/:id/edit', [App\Controllers\TrainingUserController::class, 'edit']);
Route::put('/trainingUser/:id',      [App\Controllers\TrainingUserController::class, 'update']);
Route::post('/trainingUser',         [App\Controllers\TrainingUserController::class, 'create']);
Route::delete('/trainingUser',       [App\Controllers\TrainingUserController::class, 'destroy']);

Route::get('/admins/users',              [App\Controllers\Admins\UsersController::class, 'index']);
Route::get('/admins/users/page/:page',   [App\Controllers\Admins\UsersController::class, 'index']);
