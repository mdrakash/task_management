<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);


Route::middleware('auth:api')->group(function () {
    // Logout route
    Route::post('/logout', [AuthenticationController::class, 'logout']);

    // Get the authenticated user's information
    Route::get('/me', [UserController::class, 'me']);

    // Get the all User's Information
    Route::get('/get-users', [UserController::class, 'getAllUsers']);

    // Define resource routes for tasks
    // Excluding the 'create' and 'edit' methods as they are not needed
    Route::resource('tasks', TaskController::class)->except(['create', 'edit']);
});