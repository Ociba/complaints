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
        Route::post('/complaints/{complaintId}/location', [ComplaintController::class, 'postComplaintLocation']);
        Route::post('/sos', [SOSController::class, 'handleSOS'])->name('api.sos');

// In routes/api.php
        Route::middleware('auth:api')->group(function() {
            Route::get('/test-sos-email', function() {
                $user = auth()->user(); // Now using JWT auth

                if (!$user->emergencyContacts()->exists()) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'No emergency contacts found'
                    ], 400);
                }

                $sosData = [
                    'user' => $user->name,
                    'user_id' => $user->id,
                    'latitude' => 40.7128,
                    'longitude' => -74.0060,
                    'message' => 'This is a test emergency alert!',
                    'time' => now()->format('Y-m-d H:i:s T'),
                    'map_url' => "https://www.google.com/maps?q=40.7128,-74.0060",
                ];

                $contact = $user->emergencyContacts()
                    ->whereNotNull('email')
                    ->where('receive_email', true)
                    ->first();

                if (!$contact) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'No contacts with email notifications enabled'
                    ], 400);
                }

                try {
                    $contact->notify(new \App\Notifications\SOSNotification($sosData));

                    return response()->json([
                        'status' => 'success',
                        'message' => 'Test SOS email sent successfully',
                        'sent_to' => $contact->email,
                        'contact_name' => $contact->name,
                        'sos_data' => $sosData
                    ]);

                } catch (\Exception $e) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Failed to send test email',
                        'error' => $e->getMessage()
                    ], 500);
                }
            });
        });
    });
});
