<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;

Route::prefix('v1')->group(function() {
    Route::get('countries', [CountryController::class, 'index']);
    // Authentication Routes
    Route::prefix('auth')->group(function() {
        Route::match(['GET','POST'],'register', [ApiAuthController::class, 'register']);
        Route::post('login', [ApiAuthController::class, 'login']);

        Route::middleware('auth:sanctum')->group(function() {
            Route::post('logout', [ApiAuthController::class, 'logout']);
            Route::get('me', [ApiAuthController::class, 'me']);
        });

        Route::post('complaints/upload-audio', [ComplaintController::class, 'uploadAudio']);
        Route::post('complaints/upload-video', [ComplaintController::class, 'uploadVideo']);
        Route::post('complaints/upload-audio-recording', [ComplaintController::class, 'uploadAudioRecording']);
        Route::post('complaints/upload-video-recording', [ComplaintController::class, 'uploadVideoRecording']);
        Route::post('complaints/submit-text', [ComplaintController::class, 'submitTextComplaint']); // For text complaints

    });

    // Complaint Routes
    Route::middleware('auth:api')->group(function() {
        Route::apiResource('complaints', ComplaintController::class);
    });
});
