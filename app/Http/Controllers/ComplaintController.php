<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Http\Resources\ComplaintResource;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::where('user_id', Auth::id())->get();
        return ComplaintResource::collection($complaints);
    }

    /**
     * Store a newly created complaint in storage.
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required',
    //         'description' => 'required',
    //         'payment_id' => 'nullable|exists:payments,id'
    //     ]);
    
    //     $complaint =Complaint::create([
    //         'user_id' => 1,
    //         'payment_id' => $request->payment_id,
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'status' => 'pending'
    //     ]);
    
    //     return response()->json(new ComplaintResource($complaint), 201);
    // }
  

     public function store(Request $request)
    {
        // Ensure this is an API request
        // Strict API guard
        abort_unless($request->expectsJson(), 403, 'Only JSON requests accepted');

        // Strict authentication check
        if (!auth()->check()) {
            abort(401, 'Unauthenticated');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'payment_id' => 'nullable|exists:payments,id'
        ]);

        $userId = Auth::id(); // No fallback - authentication is required

        // Payment validation logic
        if ($request->payment_id) {
            $paymentExists = Payment::where('id', $request->payment_id)
                                    ->where('user_id', $userId)
                                    ->exists();
            
            if (!$paymentExists) {
                return response()->json([
                    'message' => 'Payment not found for this user',
                    'redirect_url' => 'http://localhost:8000/api/create-payment', // Use named route
                    'redirect_method' => 'POST'
                ], 403);
            }
        } else {
            $hasPayment = Payment::where('user_id', $userId)->exists();
            
            if (!$hasPayment) {
                return response()->json([
                    'message' => 'User has no payments. Please create a payment first.',
                    'redirect_url' => 'http://localhost:8000/api/create-payment', // Use named route
                    'redirect_method' => 'POST',
                    'user_id' => $userId // For debugging
                ], 403);
            }
        }

        try {
            $complaint = Complaint::create([
                'user_id' => $userId,
                'payment_id' => $request->payment_id,
                'title' => $request->title,
                'description' => $request->description,
                'status' => 'pending'
            ]);

            return response()->json([
                'data' => new ComplaintResource($complaint),
                'message' => 'Complaint created successfully'
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to create complaint',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    /**
     * Display the specified complaint.
     */
    public function show(Complaint $complaint)  // <-- Type-hint the Complaint model
    {
        return response()->json([
            'success' => true,
            'data' => new ComplaintResource($complaint)
        ]);
    }
      /**
     * Update the specified complaint in storage.
     */
    public function update(Request $request, Complaint $complaint)
    {
        $complaint->update($request->validate([
            'title' => 'sometimes|required',
            'description' => 'sometimes|required',
            'status' => 'sometimes|in:pending,processing,resolved,rejected'
        ]));
    
        return new ComplaintResource($complaint);
    }

    /**
     * Remove the specified complaint from storage.
     */
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Complaint deleted successfully'
        ]);
    }
}
