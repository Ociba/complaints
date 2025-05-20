<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Resources\ComplaintResource;
use App\Models\Payment;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Log;

class ComplaintController extends Controller
{
    /**
     * Get all complaints for the authenticated user
     */
    public function index(Request $request): AnonymousResourceCollection
    {
        // Get user ID from JWT token
        $userId = $request->user()->id;

        // Only select necessary columns and order by latest
        $complaints = Complaint::where('user_id', $userId)
            ->select(['id', 'title', 'status', 'created_at', 'payment_id'])
            ->orderBy('created_at', 'desc')
            ->get();

        return ComplaintResource::collection($complaints);
    }

    /**
     * Create a new complaint
     */
    public function store(Request $request): JsonResponse
    {
        // Get user ID from JWT token
        $userId = $request->user()->id;

        // Validate input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'payment_id' => 'nullable|exists:payments,id'
        ]);

        // Payment validation with optimized queries
        if (isset($validated['payment_id'])) {
            $paymentValid = Payment::where('id', $validated['payment_id'])
                ->where('user_id', $userId)
                ->exists();

            if (!$paymentValid) {
                return response()->json([
                    'message' => 'Payment not found for this user',
                    'redirect_url' => route('payments.create'),
                    'redirect_method' => 'POST'
                ], 403);
            }
        } else {
            // Only check for any payment if none specified
            $hasPayment = Payment::where('user_id', $userId)
                ->exists();

            if (!$hasPayment) {
                return response()->json([
                    'message' => 'User has no payments. Please create a payment first.',
                    'redirect_url' => route('payments.create'),
                    'redirect_method' => 'POST'
                ], 403);
            }
        }

        try {
            $complaint = Complaint::create([
                'user_id' => $userId,
                'payment_id' => $validated['payment_id'] ?? null,
                'title' => $validated['title'],
                'description' => $validated['description'],
                'status' => 'pending'
            ]);

            return response()->json([
                'data' => new ComplaintResource($complaint),
                'message' => 'Complaint created successfully'
            ], 201);

        } catch (\Exception $e) {
            Log::error('Complaint creation failed for user ' . $userId . ': ' . $e->getMessage());
            return response()->json([
                'message' => 'Failed to create complaint',
                'error' => config('app.debug') ? $e->getMessage() : 'Internal server error'
            ], 500);
        }
    }

    /**
     * Show a specific complaint with authorization check
     */
    public function show(Request $request, Complaint $complaint)
    {
        // Authorization check - ensure user owns the complaint
        if ($request->user()->id !== $complaint->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return new ComplaintResource($complaint->loadMissing('payment'));
    }

    /**
     * Update a complaint
     */
    public function update(Request $request, Complaint $complaint)
    {
        // Authorization check
        if ($request->user()->id !== $complaint->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'status' => 'sometimes|in:pending,processing,resolved,rejected'
        ]);

        $complaint->update($validated);

        return new ComplaintResource($complaint);
    }

    /**
     * Delete a complaint
     */
    public function destroy(Request $request, Complaint $complaint)
    {
        // Authorization check
        if ($request->user()->id !== $complaint->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $complaint->delete();

        return response()->json([
            'success' => true,
            'message' => 'Complaint deleted successfully'
        ]);
    }
}
