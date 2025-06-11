<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintLocation;
use App\Models\EmergencyContact;
use App\Services\UploadService; // Keep if used elsewhere, but not in this snippet
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SOSNotification;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Services\FirebaseService; // Keep if used elsewhere, but not in this snippet

class SOSController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function handleSOS(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'message' => 'sometimes|string|max:500',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = auth()->user();
        // Assuming EmergencyContact::all() retrieves contacts with email addresses
        // If you need to filter for contacts with mail, you might do:
        // $emergencyContacts = EmergencyContact::whereNotNull('email')->where('email', '!=', '')->get();
        $emergencyContacts = EmergencyContact::all();
        $user = User::whereId($user->id)->first();

        // It's better to check for actual email addresses rather than just if the collection is empty
        $receivableContacts = $emergencyContacts->filter(function ($contact) {
            return !empty($contact->email);
        });

        if ($receivableContacts->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No emergency contacts with valid email addresses found.'
            ], 400);
        }

        $sosData = [
            'user' => $user->name,
            'user_id' => $user->id,
            'type' => 'text',
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'content' => $request->message ?? 'SOS Notification, Immediate attention needed', // Use provided message or default
            'message' => $request->message ?? 'Immediate attention needed!', // Pass 'message' key for consistency with blade
            'time' => now()->format('Y-m-d H:i:s T'),
            // CORRECTED MAP URL FORMAT
            'map_url' => "https://www.google.com/maps?q={$request->latitude},{$request->longitude}",
        ];


        try {
            // register complaints
            $complaint = Complaint::create($sosData);

            ComplaintLocation::create([
                'complaint_id' => $complaint->id,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
            ]);

            // Send notification only to contacts with valid mail
            Notification::send($receivableContacts, new SOSNotification($sosData));

            return response()->json([
                'status' => 'success',
                'message' => 'SOS alerts sent to ' . $receivableContacts->count() . ' contacts.',
                'data' => $sosData
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to send alerts',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
