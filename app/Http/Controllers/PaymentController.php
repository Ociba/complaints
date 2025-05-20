<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\PaymentResource;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    /**
     * Create a new payment
     */
    public function store(Request $request): JsonResponse
    {
        // Get user ID from JWT token
        $userId = $request->user()->id;

        // Validate input with strict rules
        $validated = $request->validate([
            'amount' => [
                'required',
                'numeric',
                'min:0.01',
                'max:999999.99', // Add reasonable upper limit
                'regex:/^\d+(\.\d{1,2})?$/' // Ensure proper decimal format
            ],
            'payment_method' => [
                'required',
                'string',
                'in:card,bank_transfer,wallet'
            ],
            'transaction_id' => [
                'nullable',
                'string',
                'max:64',
                'unique:payments,transaction_id'
            ]
        ]);

        try {
            $payment = Payment::create([
                'user_id' => $userId,
                'amount' => $validated['amount'],
                'transaction_id' => $validated['transaction_id'] ?? $this->generateTransactionId(),
                'payment_method' => $validated['payment_method'],
                'status' => 'pending',
                'paid_at' => now()
            ]);

            return response()->json([
                'data' => new PaymentResource($payment),
                'message' => 'Payment created successfully'
            ], 201);

        } catch (\Exception $e) {
            Log::error('Payment creation failed for user ' . $userId . ': ' . $e->getMessage());

            return response()->json([
                'message' => 'Failed to process payment',
                'error' => config('app.debug') ? $e->getMessage() : null
            ], 500);
        }
    }

    /**
     * Generate a unique transaction ID if none provided
     */
    protected function generateTransactionId(): string
    {
        return 'PAY-' . now()->format('YmdHis') . '-' . strtoupper(bin2hex(random_bytes(4)));
    }
}
