<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminComplaintController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SystemSettingController;

Route::get('/', function () {
    return view('welcome');
})->name('Welcome');



Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('Home');
Route::get('/logout', [HomeController::class, 'logoutUser']);

// User routes
Route::post('/complaints', [ComplaintController::class, 'store']);
Route::post('/complaints/{complaint}/pay', [PaymentController::class, 'initiatePayment']);
Route::get('/payments/verify', [PaymentController::class, 'verifyPayment']); // Webhook/Callback

Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->group(function () {
    // Complaints 
    Route::get('/complaints', [AdminComplaintController::class, 'index'])->name('Complaints');
    Route::get('/complaint-details/{complaintId}', [AdminComplaintController::class, 'complaintDetails'])->name('Complaints Details');
    Route::get('/locate/{complaintId}', [AdminComplaintController::class, 'locateComplaint'])->name('Locate Complaint');

    Route::post('/complaints/{complaint}/resolve', [AdminComplaintController::class, 'resolve'])->name('complaints.resolve');

    // Payments
    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('Transactions');
    Route::get('/settings/complaint_fee', [SystemSettingController::class, 'complaintFee'])->name('Complaint Fee');
    Route::post('/complaints/{complaint}/refund', [AdminPaymentController::class, 'refund'])->name('complaints.refund');
    Route::get('/settings/system_user', [SystemSettingController::class, 'systemUser'])->name('Users');
    Route::post('/settings/{id}', [SystemSettingController::class, 'update'])->name('settings.update');
    Route::get('/settings/add/{setting}', [SystemSettingController::class, 'show'])->name('Show');
});
// Test route
// Add this to your web.php
Route::get('/play-audio/{filename}', function($filename) {
    $path = public_path('complaints/recorded_audio/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path, [
        'Content-Type' => 'audio/mp4',
        'Accept-Ranges' => 'bytes', // Important for streaming
    ]);
})->name('audio.play'); 


// In your route
Route::get('/video/{filename}', function($filename) {
    logger()->info('Video access attempt', ['filename' => $filename]);
    $path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, 
        public_path('complaints/recorded_videos/' . $filename));
    
    if (!file_exists($path)) {
        abort(404, "File not found at: " . $path);
    }

    // Clear output buffers
    while (ob_get_level()) ob_end_clean();
    
    // Determine MIME type - default to video/mp4 for .temp files
    $mime = str_ends_with(strtolower($filename), '.temp') 
        ? 'video/mp4' 
        : (mime_content_type($path) ?: 'video/mp4');

    // Stream the file directly with proper headers
    return response()->stream(function() use ($path) {
        $stream = fopen($path, 'rb');
        fpassthru($stream);
        fclose($stream);
    }, 200, [
        'Content-Type' => $mime,
        'Content-Length' => filesize($path),
        'Accept-Ranges' => 'bytes',
        'Cache-Control' => 'no-cache',
        'Content-Disposition' => 'inline; filename="' . basename($path) . '"'
    ]);
})->name('video.play');

Route::get('/test-video', function() {
    $path = 'E:\Julius Projects\Complaint System\public\complaints\recorded_videos\rec6322911514257553334_1749288281.temp';
    
    if (!file_exists($path)) {
        return "File does NOT exist at: " . $path;
    }

    // Clear output buffers
    while (ob_get_level()) ob_end_clean();
    
    // Stream the file directly
    header('Content-Type: video/mp4');
    header('Content-Length: ' . filesize($path));
    readfile($path);
    exit;
});
