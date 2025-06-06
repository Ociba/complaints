<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\Complaint; // Import the Complaint model
use App\Models\FileComplaint; // Import the FileComplaint model
use Illuminate\Support\Facades\Log; // For logging

class ComplaintController extends Controller
{
    // Constructor to apply middleware
    public function __construct()
    {
        // Apply 'auth:api' middleware to all methods in this controller
        // This ensures only authenticated users can access these endpoints.
        $this->middleware('auth:api');
    }

    /**
     * Handles the common logic for file uploads (audio, video, attachments).
     *
     * @param Request $request The incoming HTTP request.
     * @param string $complaintType The type of complaint (e.g., 'audio_recording', 'video_file_upload').
     * @param string $subDirectory The subdirectory within 'public/complaints' to store the file.
     * @return \Illuminate\Http\JsonResponse
     */
    protected function handleFileComplaint(Request $request, $complaintType, $subDirectory)
    {
        // Get the authenticated user
        $user = auth()->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $validator = Validator::make($request->all(), [
            'file' => 'required|file|max:204800', // Max 200MB (200 * 1024 KB)
            // The 'type' field from Flutter's FormData is mapped to $complaintType argument here
            // No need to validate 'type' directly from request if it's derived from the route
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $mimeType = $file->getClientMimeType();
            $fileSize = $file->getSize(); // Size in bytes

            // Sanitize filename and make it unique
            $fileName = Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '_' . time() . '.' . $extension;

            try {
                // Store in 'storage/app/public/complaints/{subDirectory}/{fileName}'
                $path = $file->storeAs("public/complaints/{$subDirectory}", $fileName);

                // Create a FileComplaint record
                $fileComplaint = FileComplaint::create([
                    'filename' => $fileName,
                    'path' => $path, // Relative path in storage
                    'file_type' => $complaintType, // e.g., 'audio_recording', 'video_file_upload'
                    'original_name' => $originalName,
                    'mime_type' => $mimeType,
                    'size' => $fileSize,
                ]);

                // Create a main Complaint record, linking to the FileComplaint
                $complaint = Complaint::create([
                    'user_id' => $user->id,
                    'type' => Str::before($complaintType, '_'), // Extracts 'audio' or 'video'
                    'file_complaint_id' => $fileComplaint->id,
                    'status' => 'pending',
                    // 'content' remains null for file-based complaints unless specific text is also sent
                ]);

                return response()->json([
                    'success' => true,
                    'message' => ucfirst(str_replace('_', ' ', $complaintType)) . ' uploaded and complaint created successfully.',
                    'file_data' => [
                        'id' => $fileComplaint->id,
                        'filename' => $fileComplaint->filename,
                        'original_name' => $fileComplaint->original_name,
                        'path' => Storage::url($fileComplaint->path), // Public URL
                        'file_type' => $fileComplaint->file_type,
                    ],
                    'complaint_id' => $complaint->id,
                    'complaint_type' => $complaint->type,
                ], 201);

            } catch (\Exception $e) {
                // Log any exceptions during file storage or database saving
                return response()->json(['success' => false, 'message' => 'Failed to process file complaint due to server error.'], 500);
            }
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded or invalid file.'], 400);
    }


    /**
     * Handles uploading an audio file complaint.
     */
    public function uploadAudio(Request $request)
    {
        // Add specific mimes validation here
        $file = $request->file('file');
        $mimeType = $file->getMimeType();
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
        $request->validate(['file' => 'mimes:mp3,wav,aac,m4a']);
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

        Log::info("Submitting text complaint for user: {$user->id}");

        $validator = Validator::make($request->all(), [
            'text' => 'required|string|max:5000', // Matches 'text' key from Flutter
            // The 'type' field from Flutter's FormData (e.g., 'text') is implicitly handled by this specific endpoint.
        ]);

        if ($validator->fails()) {
            Log::warning("Text complaint validation failed for user {$user->id}: " . json_encode($validator->errors()->toArray()));
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            // Create a main Complaint record for a text complaint
            $complaint = Complaint::create([
                'user_id' => $user->id,
                'type' => 'text',
                'content' => $request->input('text'), // Use 'text' as per Flutter's FormData
                'file_complaint_id' => null, // No file for text complaints
                'status' => 'pending',
            ]);

            Log::info("Text complaint submitted successfully for user {$user->id}. Complaint ID: {$complaint->id}");

            return response()->json([
                'success' => true,
                'message' => 'Text complaint submitted successfully.',
                'complaint_id' => $complaint->id,
                'complaint_type' => $complaint->type,
            ], 201);

        } catch (\Exception $e) {
            Log::error("Error submitting text complaint for user {$user->id}: " . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
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

        // Get the filter_type from query parameters (e.g., ?filter_type=audio)
        $filterType = $request->input('filter_type');

        // Start building the query
        $query = Complaint::with('fileComplaint')
            ->where('user_id', $user->id)
            ->orderByDesc('created_at');

        // Apply filtering if a specific filterType is provided and it's not 'all'
        // The Flutter app sends 'audio', 'video', 'text' or nothing (null) for 'All'
        if ($filterType && $filterType !== 'all') {
            $query->where('type', $filterType); // Filter by the 'type' column in the complaints table
        }

        $userComplaints = $query->get(); // Execute the query


        return response()->json([
            'success' => true,
            'message' => 'Complaints retrieved successfully.',
            'complaints' => $userComplaints->map(function($complaint) {
                return [
                    'id' => $complaint->id,
                    'type' => $complaint->type,
                    'content' => $complaint->content, // Only for text complaints
                    'status' => $complaint->status,
                    'created_at' => $complaint->created_at->toDateTimeString(),
                    'file_data' => $complaint->fileComplaint ? [
                        'id' => $complaint->fileComplaint->id,
                        'filename' => $complaint->fileComplaint->filename,
                        'original_name' => $complaint->fileComplaint->original_name,
                        'path' => Storage::url($complaint->fileComplaint->path),
                        'file_type' => $complaint->fileComplaint->file_type,
                    ] : null,
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
            ->where('status', 'solved') // Assuming 'solved' is the status for solved complaints
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
}
