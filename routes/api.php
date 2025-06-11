<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\SOSController;
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
    Route::middleware('auth:api')->group(function() { // <--- Apply auth:api here for all protected routes
        // Auth-related routes (logout, me)
        Route::post('auth/logout', [ApiAuthController::class, 'logout']);

        Route::post('complaints/upload-audio', [ComplaintController::class, 'uploadAudio']);
        Route::post('complaints/upload-video', [ComplaintController::class, 'uploadVideo']);
        Route::post('complaints/upload-audio-recording', [ComplaintController::class, 'uploadAudioRecording']);
        Route::post('complaints/upload-video-recording', [ComplaintController::class, 'uploadVideoRecording']);
        Route::post('complaints/submit-text', [ComplaintController::class, 'submitTextComplaint']);
        Route::get('complaints', [ComplaintController::class,'complaints']);
        Route::get('/complaints/counts', [ComplaintController::class, 'getComplaintCounts']);
        Route::post('/complaints/{complaintId}/location', [ComplaintController::class, 'postComplaintLocation']);

        // Now correctly protected by auth:api
        Route::post('/sos', [SOSController::class, 'handleSOS'])->name('api.sos');
    });
});
