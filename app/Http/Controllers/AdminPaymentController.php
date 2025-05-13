<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Complaint;

class AdminPaymentController extends Controller
{
    public function index(){
        $payments =Payment::get();
        return view('admin.payments.payments',compact('payments'));
    }

    public function refund(Complaint $complaint)
    {
        
        $payment = $complaint->payment;
        $payment->update(['status' => 'refunded']);

        return back()->with('success', 'Payment #'.$payment->id.' refund processed!');
    }
}
