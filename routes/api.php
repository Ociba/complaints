<?php

use App\Http\Controllers\Api\ApiAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;

Route::prefix('v1')->group(function() {
    // Authentication Routes
    Route::prefix('auth')->group(function() {
        Route::post('register', [ApiAuthController::class, 'register']);
        Route::post('login', [ApiAuthController::class, 'login']);

        Route::middleware('auth:sanctum')->group(function() {
            Route::post('logout', [ApiAuthController::class, 'logout']);
            Route::get('me', [ApiAuthController::class, 'me']);
        });
    });

    // Complaint Routes
    Route::middleware('auth:api')->group(function() {
        Route::apiResource('complaints', ComplaintController::class);
    });
});
