<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintLocation;
use App\Models\EmergencyContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class SOSController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function handleSos(Request $request)
    {
        try {
            // Validate the incoming request
            $validator = Validator::make($request->all(), [
                'type' => 'required|string',
                'timestamp' => 'required|date',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $type = $request->input('type', 'SOS');
            $isEmergency = strtoupper($type) === 'SOS';

            // Create the complaint record
            $complaint = Complaint::create([
                'user_id' => auth()->id(),
                'type' => $type, // Fixed: was hardcoded to 'text'
                'status' => $isEmergency ? 'emergency' : 'pending',
                'description' => $isEmergency ? 'Emergency SOS triggered' : 'Complaint submitted',
                'timestamp' => $request->input('timestamp'),
            ]);

            return response()->json([
                'success' => true,
                'message' => $isEmergency
                    ? 'Emergency SOS created successfully. Please send location data.'
                    : 'Complaint created successfully',
                'complaint_id' => $complaint->id,
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to process request',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
