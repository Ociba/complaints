<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Resources\PaymentResource;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // public function store(Request $request) {
      
            // $request->validate([
            //     'amount' => 'required',
            //     'transaction_id' => '',
            //     'payment_method' => 'required'
            // ]);
        
            // $payment =Payment::create([
            //     'user_id' => 1,
            //     'amount' => $request->amount,
            //     'transaction_id' => $request->transaction_id,
            //     'payment_method' => $request->payment_method,
            //     'paid_at' => now(),
            //     'status' => 'pending',
            // ]);
            // return response()->json(new PaymentResource($payment), 201);
            //}
            public function store(Request $request)
            {
                // Remove the web fallback completely for API-only endpoint
                $validated = $request->validate([
                    'amount' => 'required|numeric|min:0.01',
                    'payment_method' => 'required|string|in:card,bank_transfer,wallet',
                    'transaction_id' => 'nullable|string|unique:payments'
                ]);
        
                $payment = Payment::create([
                    'user_id' => Auth::id(), // Will throw 401 if unauthenticated
                    'amount' => $validated['amount'],
                    'transaction_id' => $validated['transaction_id'] ?? null,
                    'payment_method' => $validated['payment_method'],
                    'status' => 'pending',
                    'paid_at' => now()
                ]);
        
                return response()->json([
                    'data' => new PaymentResource($payment),
                    'message' => 'Payment created successfully'
                ], 201);
            }
    
}
