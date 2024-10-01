<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);


Route::middleware('auth:api')->group(function () {
    // Logout route
    Route::post('/logout', [AuthenticationController::class, 'logout']);

    // Get the authenticated user's information
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});