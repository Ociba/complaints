<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintLocation;
use App\Models\EmergencyContact;
use App\Services\UploadService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Notifications\SOSNotification;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Services\FirebaseService;

class SOSController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    // app/Http/Controllers/SOSController.php
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
        $emergencyContacts = EmergencyContact::all();
        $user = User::whereId($user->id)->first();

        if ($emergencyContacts->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No emergency contacts with email addresses found'
            ], 400);
        }

        $sosData = [
            'user' => $user->name,
            'user_id' => $user->id,
            'type' => 'sos',
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'content' => 'SOS Notification, Immediate attention needed',
            'time' => now()->format('Y-m-d H:i:s T'),
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

            Notification::send($emergencyContacts, new SOSNotification($sosData));

            return response()->json([
                'status' => 'success',
                'message' => 'SOS alerts sent to ' . $emergencyContacts->count() . ' contacts',
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
