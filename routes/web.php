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
