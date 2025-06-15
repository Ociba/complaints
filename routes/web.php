<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminComplaintController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SystemSettingController;
use App\Http\Controllers\FrontPagesController;
use App\Http\Controllers\ComplaintExportController;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\ContactsController;

use App\Notifications\SOSNotification;


Route::get('/', function () { return view('welcome');})->name('Welcome');

Route::get('/about_us', [FrontPagesController::class, 'aboutUs'])->name('About Us');
Route::get('/feedback', [FrontPagesController::class, 'feedback'])->name('Feedback');
Route::get('/privacy_policy', [FrontPagesController::class, 'privacyPolicy'])->name('Private Policy');
Route::get('/mobile-app-instructions', [FrontPagesController::class, 'mobileAppInstructions'])->name('Mobile App Instructions');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('Home');
Route::get('/logout', [HomeController::class, 'logoutUser']);

// User routes
Route::post('/complaints', [ComplaintController::class, 'store']);
Route::post('/complaints/{complaint}/pay', [PaymentController::class, 'initiatePayment']);
Route::get('/payments/verify', [PaymentController::class, 'verifyPayment']); // Webhook/Callback

Route::middleware(['auth', \App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->group(function () {
    // Complaints
    // Route::get('/complaints', [AdminComplaintController::class, 'index'])->name('Complaints');

    Route::get('/complaints', [AdminComplaintController::class, 'index'])->name('complaints.index');
    Route::get('/complaints/status/{status}', [AdminComplaintController::class, 'getComplaintByStatus'])->name('complaints.status');
    Route::get('/complaints/type/{type}', [AdminComplaintController::class, 'getComplaintByType'])->name('complaints.type');
    Route::get('/complaints/report', [AdminComplaintController::class, 'getComplaintReport'])->name('complaints.report');
    Route::get('/export-complaints/{status?}/{period?}', [ComplaintExportController::class, 'export']);
    Route::get('/export-users', function () {return Excel::download(new UsersExport, 'users.xlsx');});
    Route::get('/emergency-contacts', [ContactsController::class, 'emergencyContacts'])->name('Emergency Contacts');
    Route::get('/client-testimony', [ContactsController::class, 'clientTestimony'])->name('Client Testimony');
    Route::get('/create-testimony',[ContactsController::class, 'createTestimony'])->name('Create Testimony');

    Route::get('/complaint-details/{complaintId}', [AdminComplaintController::class, 'complaintDetails'])->name('Complaints Details');
    Route::get('/locate/{complaintId}', [AdminComplaintController::class, 'locateComplaint'])->name('Locate Complaint');
    Route::get('/print-complaint/{complaintId}', [AdminComplaintController::class, 'PrintComplaint'])->name('Complaint Print');

    Route::post('/complaints/{complaint}/resolve', [AdminComplaintController::class, 'resolve'])->name('complaints.resolve');

    // Payments
    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('Transactions');
    Route::get('/settings/complaint_fee', [SystemSettingController::class, 'complaintFee'])->name('Complaint Fee');
    Route::post('/complaints/{complaint}/refund', [AdminPaymentController::class, 'refund'])->name('complaints.refund');
    Route::get('/settings/system_user', [SystemSettingController::class, 'systemUser'])->name('Users');
    Route::post('/settings/{id}', [SystemSettingController::class, 'update'])->name('settings.update');
    Route::get('/settings/add/{setting}', [SystemSettingController::class, 'show'])->name('Show');
    Route::get('/settings/user-details/{userId}',[SystemSettingController::class, 'userDetails'])->name('User Details');
    Route::get('/settings/{userId}/{status}', [SystemSettingController::class, 'getUserComplaintByStatus'])->name('User Complaints');
    Route::get('/settings/all/{userId}/{type}', [SystemSettingController::class, 'getUserComplaintByType'])->name('User Complaints Type');
    Route::get('/settings/create-emergency-contact', [SystemSettingController::class, 'createEmergencyContact'])->name('Emergency Contact Form');
});

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



