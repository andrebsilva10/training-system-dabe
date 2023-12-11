<?php

use Core\Routes\Route;

Route::get('/',          [App\Controllers\AuthController::class, 'new']);

Route::get('/sign-up',   [App\Controllers\UsersController::class, 'new']);
Route::post('/sign-up',  [App\Controllers\UsersController::class, 'create']);

Route::get('/login',     [App\Controllers\AuthController::class, 'new']);
Route::post('/login',    [App\Controllers\AuthController::class, 'create']);
Route::get('/logout',    [App\Controllers\AuthController::class, 'destroy']);

Route::get('/profile',   [App\Controllers\ProfileController::class, 'show']);
Route::post('/profile',  [App\Controllers\ProfileController::class, 'updateAvatar']);

Route::get('/trainings',     [App\Controllers\TrainingsController::class, 'index']);
Route::get('/trainings/:id', [App\Controllers\TrainingsController::class, 'show']);
Route::post('/trainings',    [App\Controllers\TrainingsController::class, 'create']);
Route::delete('/trainings',  [App\Controllers\TrainingsController::class, 'destroy']);

#Route::post('/trainings/:training_id/collaborators',        [App\Controllers\TrainingsCollaboratorsController::class, 'add']);
#Route::delete('/trainings/:training_id/collaborators/:id',  [App\Controllers\TrainingsCollaboratorsController::class, 'destroy']);

Route::get('/admins/users',              [App\Controllers\Admins\UsersController::class, 'index']);
Route::get('/admins/users/page/:page',   [App\Controllers\Admins\UsersController::class, 'index']);