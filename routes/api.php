<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ComplaintController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    // Public Routes (No Auth)
    Route::get('countries', [CountryController::class, 'index']);

    // Auth Routes (No Middleware, since login/register don't need JWT)
    Route::prefix('auth')->group(function() {
        Route::match(['GET', 'POST'], 'register', [ApiAuthController::class, 'register']);
        Route::post('login', [ApiAuthController::class, 'login']);
    });

    // Protected Routes (Require JWT)
    Route::middleware('api')->group(function() {
        // Auth-related routes (logout, me)
        Route::post('auth/logout', [ApiAuthController::class, 'logout']);

        Route::post('complaints/upload-audio', [ComplaintController::class, 'uploadAudio']);
        Route::post('complaints/upload-video', [ComplaintController::class, 'uploadVideo']);
        Route::post('complaints/upload-audio-recording', [ComplaintController::class, 'uploadAudioRecording']);
        Route::post('complaints/upload-video-recording', [ComplaintController::class, 'uploadVideoRecording']);
        Route::post('complaints/submit-text', [ComplaintController::class, 'submitTextComplaint']);
        Route::get('complaints', [ComplaintController::class,'complaints']);
        Route::get('/complaints/counts', [ComplaintController::class, 'getComplaintCounts']);
    });
});
