<?php

namespace App\Http\Controllers;

use App\Models\ComplaintLocation;
use App\Models\EmergencyContact;
use App\Notifications\SOSNotification;
use App\Services\UploadService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Complaint; // Import the Complaint model
use App\Models\FileComplaint; // Import the FileComplaint model
use Illuminate\Support\Facades\Log; // For logging
use Illuminate\Support\Facades\Notification;

class ComplaintController extends Controller
{
    // Constructor to apply middleware
    protected $uploadService;

    public function __construct(UploadService $uploadService)
    {
        $this->middleware('auth:api');
        $this->uploadService = $uploadService;
    }

    protected function handleFileComplaint(Request $request, $complaintType, $subDirectory)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $validator = Validator::make($request->all(), [
            'file' => 'required|file|max:204800',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            // Pass 'recorded_audio' or similar for $subDirectory
            $fileData = $this->uploadService->uploadComplaintFile(
                $request->file('file'),
                $subDirectory // e.g., 'recorded_audio'
            );

            // Create FileComplaint record
            $fileComplaint = FileComplaint::create([
                'filename' => $fileData['filename'],
                'path' => $fileData['path'], // Stores "complaints/recorded_audio/filename.m4a"
                'file_type' => $complaintType,
                'original_name' => $fileData['original_name'],
                'mime_type' => $fileData['mime_type'],
                'size' => $fileData['size'],
            ]);

            // Create main Complaint record
            $complaint = Complaint::create([
                'user_id' => $user->id,
                'type' => Str::before($complaintType, '_'),
                'file_complaint_id' => $fileComplaint->id,
                'status' => 'pending',
            ]);

            return response()->json([
                'success' => true,
                'message' => ucfirst(str_replace('_', ' ', $complaintType)) . ' uploaded successfully.',
                'file_data' => [
                    // Storage::url() will now resolve to http://localhost:8000/complaints/...
                    'path' => Storage::url($fileData['path']),
                    'original_name' => $fileData['original_name'],
                ],
                'complaint_id' => $complaint->id,
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'File upload failed: ' . $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Handles uploading an audio file complaint.
     */
    public function uploadAudio(Request $request)
    {
        // Add specific mimes validation here
        $file = $request->file('file');
        $file->getMimeType();
        $extension = $file->getClientOriginalExtension();

        if (!in_array($extension, ['mp3', 'wav', 'aac', 'm4a'])) {
            return response()->json(['error' => 'Invalid file type'], 400);
        }
        return $this->handleFileComplaint($request, 'audio_file_upload', 'uploaded_audio');
    }

    /**
     * Handles uploading a video file complaint.
     */
    public function uploadVideo(Request $request)
    {
        // Add specific mimes validation here
        $request->validate(['file' => 'mimes:mp4,mov,avi,mkv']);
        return $this->handleFileComplaint($request, 'video_file_upload', 'uploaded_videos');
    }

    /**
     * Handles uploading an audio recording complaint.
     */
    public function uploadAudioRecording(Request $request)
    {
        // Add specific mimes validation here
        $file = $request->file('file');
        $file->getMimeType();
        $extension = $file->getClientOriginalExtension();

        if (!in_array($extension, ['mp3', 'wav', 'aac', 'm4a'])) {
            return response()->json(['error' => 'Invalid file type'], 400);
        }
        return $this->handleFileComplaint($request, 'audio_recording', 'recorded_audio');
    }

    /**
     * Handles uploading a video recording complaint.
     */
    public function uploadVideoRecording(Request $request)
    {
        // Add specific mimes validation here
        $request->validate(['file' => 'mimes:mp4,mov,avi,mkv']);
        return $this->handleFileComplaint($request, 'video_recording', 'recorded_videos');
    }

    /**
     * Submits a text-based complaint.
     */
    public function submitTextComplaint(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $validator = Validator::make($request->all(), [
            'text_content' => 'required|string|max:5000', // Matches 'text' key from Flutter
            // The 'type' field from Flutter's FormData (e.g., 'text') is implicitly handled by this specific endpoint.
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            // Create a main Complaint record for a text complaint
            $complaint = Complaint::create([
                'user_id' => $user->id,
                'type' => 'text',
                'content' => $request->input('text_content'), // Use 'text' as per Flutter's FormData
                'file_complaint_id' => null, // No file for text complaints
                'status' => 'pending',
            ]);


            return response()->json([
                'success' => true,
                'message' => 'Text complaint submitted successfully.',
                'complaint_id' => $complaint->id,
                'complaint_type' => $complaint->type,
            ], 201);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to submit text complaint due to server error.'], 500);
        }
    }

    /**
     * Handles the route for listing complaints.
     * Fetches complaints for the authenticated user, optionally filtered by type.
     */
    public function complaints(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $filterType = $request->input('filter_type');

        $query = Complaint::with('fileComplaint')
            ->where('user_id', $user->id)
            ->orderByDesc('created_at');

        if ($filterType && $filterType !== 'all') {
            $query->where('type', $filterType);
        }

        $userComplaints = $query->get();

        return response()->json([
            'success' => true,
            'message' => 'Complaints retrieved successfully.',
            'complaints' => $userComplaints->map(function($complaint) {
                $fileData = null;

                if ($complaint->fileComplaint) {
                    $baseUrl = config('app.url'); // Get your application's base URL from .env (APP_URL)
                    $storedFilePath = $complaint->fileComplaint->path; // e.g., "complaints/recorded_audio/file.m4a"

                    // Prepend 'public/' to the stored path to make it relative to the domain root
                    $fullRelativePath = 'public/' . ltrim($storedFilePath, '/');

                    // Construct the full URL
                    // Ensure no double slashes if APP_URL already ends with one
                    $url = rtrim($baseUrl, '/') . '/' . $fullRelativePath;


                    $fileData = [
                        'id' => $complaint->fileComplaint->id,
                        'filename' => $complaint->fileComplaint->filename,
                        'original_name' => $complaint->fileComplaint->original_name,
                        'path' => $url, // This will now be http://localhost:8000/public/complaints/recorded_audio/file.mp3 (or your actual domain)
                        'file_type' => $complaint->fileComplaint->file_type,
                    ];
                }

                return [
                    'id' => $complaint->id,
                    'type' => $complaint->type,
                    'content' => $complaint->content,
                    'status' => $complaint->status,
                    'created_at' => $complaint->created_at->toDateTimeString(),
                    'file_data' => $fileData,
                ];
            }),
        ], 200);
    }

    /**
     * Counts pending and solved complaints for the authenticated user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getComplaintCounts(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $pendingCount = Complaint::where('user_id', $user->id)
            ->where('status', 'pending')
            ->count();

        $solvedCount = Complaint::where('user_id', $user->id)
            ->where('status', 'resolved') // Assuming 'solved' is the status for solved complaints
            ->count();

        return response()->json([
            'success' => true,
            'message' => 'Complaint counts retrieved successfully.',
            'counts' => [
                'pending' => $pendingCount,
                'solved' => $solvedCount,
            ],
        ], 200);
    }

    public function postComplaintLocation(Request $request, $complaintId)
    {
        $validator = Validator::make($request->all(), [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'accuracy' => 'nullable|numeric',
            'altitude' => 'nullable|numeric',
            'heading' => 'nullable|numeric',
            'speed' => 'nullable|numeric',
            'speed_accuracy' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Location data invalid, but complaint processed.',
                'errors' => $validator->errors()
            ], 200);
        }

        try {
            $location = ComplaintLocation::create([
                'complaint_id' => $complaintId,
                'latitude' => $request->input('latitude'),
                'longitude' => $request->input('longitude'),
                'accuracy' => $request->input('accuracy'),
                'altitude' => $request->input('altitude'),
                'heading' => $request->input('heading'),
                'speed' => $request->input('speed'),
                'speed_accuracy' => $request->input('speed_accuracy'),
            ]);

            // Get the full complaint with user relationship
            $complaint = Complaint::with('user')->findOrFail($complaintId);
            // Only send notifications for SOS complaints
            if (strtoupper($complaint->type) === 'SOS') {
                $this->sendEmergencyNotification($complaint, $location);
            }

            return response()->json([
                'success' => true,
                'message' => 'Location successfully attached to complaint.',
                'complaint_id' => $complaintId,
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Failed to attach location due to server error.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    protected function sendEmergencyNotification(Complaint $complaint, ComplaintLocation $location)
    {
        try {
            // Get emergency contacts who should receive emails
            $emergencyContacts = EmergencyContact::where('receive_email', true)
                ->orderBy('priority', 'asc')
                ->get();

            // Prepare notification data
            $sosData = [
                'user' => $complaint->user->name,
                'content' => 'Emergency SOS alert with location information.',
                'time' => Carbon::parse($location->created_at)->format('d M H:i'),
                'map_url' => $this->generateMapUrl($location->latitude, $location->longitude),
            ];

            // Send notifications to all emergency contacts
            foreach ($emergencyContacts as $contact) {
                Notification::route('mail', $contact->email)
                    ->notify(new SOSNotification($sosData));
            }

        } catch (\Exception $e) {
            \Log::error("Failed to send emergency notifications: " . $e->getMessage());
        }
    }

    protected function generateMapUrl($latitude, $longitude)
    {
        return "https://www.google.com/maps?q={$latitude},{$longitude}";
    }
}
