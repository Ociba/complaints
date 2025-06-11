<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminComplaintController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SystemSettingController;
use App\Notifications\SOSNotification;


Route::get('/', function () {
    return view('welcome');
})->name('Login');



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
    Route::post('/complaints/{complaint}/resolve', [AdminComplaintController::class, 'resolve'])->name('complaints.resolve');

    // Payments
    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('Transactions');
    Route::get('/settings/complaint_fee', [SystemSettingController::class, 'complaintFee'])->name('Complaint Fee');
    Route::post('/complaints/{complaint}/refund', [AdminPaymentController::class, 'refund'])->name('complaints.refund');
    Route::get('/settings/system_user', [SystemSettingController::class, 'systemUser'])->name('Users');
    Route::post('/settings/{id}', [SystemSettingController::class, 'update'])->name('settings.update');
    Route::get('/settings/add/{setting}', [SystemSettingController::class, 'show'])->name('Show');
});

Route::get('/preview-sos-email', function () {
    // 1. Prepare mock data for the notification
    // This data should mimic what your SOSController passes to the Notification
    $mockSosData = [
        'user' => 'Test User Name',
        'latitude' => '0.3476', // Example latitude for Kampala
        'longitude' => '32.5825', // Example longitude for Kampala
        'message' => 'This is a sample emergency message for email preview.',
        'time' => now()->format('Y-m-d H:i:s T'),
        // Ensure this URL is correct as per our previous discussion
        'map_url' => "http://maps.google.com/maps?q=0.3476,32.5825",
    ];

    // 2. Create an instance of your Notification
    $notification = new SOSNotification($mockSosData);

    // 3. Create a mock notifiable instance (only needs an 'email' property)
    // This is required by the toMail method, even if we're not actually sending
    $mockNotifiable = (object)['email' => 'test@example.com'];

    // 4. Get the MailMessage instance from the notification
    $mailMessage = $notification->toMail($mockNotifiable);

    // 5. Render the MailMessage to HTML
    return $mailMessage->render();
});
