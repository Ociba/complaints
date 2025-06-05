<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ComplaintController extends Controller
{
    protected function handleFileUpload(Request $request, $fileType, $subDirectory)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:mp3,wav,aac,m4a,mp4,mov,avi,mkv|max:204800', // Max 200MB, adjust mimes and max size
            'complaint_type' => 'sometimes|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            // Sanitize filename and make it unique
            $fileName = Str::slug(pathinfo($originalName, PATHINFO_FILENAME)) . '_' . time() . '.' . $extension;

            // Store in 'storage/app/public/complaints/{subDirectory}/{fileName}'
            // Ensure you run `php artisan storage:link`
            $path = $file->storeAs("public/complaints/{$subDirectory}", $fileName);

            // $url = Storage::url($path); // This gives the public URL if storage is linked

            return response()->json([
                'success' => true,
                'message' => ucfirst($fileType) . ' uploaded successfully.',
                'file_name' => $fileName,
                'path' => $path,
                // 'url' => $url,
                'original_name' => $originalName,
                'complaint_type_received' => $request->input('complaint_type', 'N/A'),
            ], 201);
        }

        return response()->json(['success' => false, 'message' => 'No file uploaded or invalid file.'], 400);
    }

    public function uploadAudio(Request $request)
    {
        return $this->handleFileUpload($request, 'audio', 'uploaded_audio');
    }

    public function uploadVideo(Request $request)
    {
        return $this->handleFileUpload($request, 'video', 'uploaded_videos');
    }

    public function uploadAudioRecording(Request $request)
    {
        return $this->handleFileUpload($request, 'audio recording', 'recorded_audio');
    }

    public function uploadVideoRecording(Request $request)
    {
        return $this->handleFileUpload($request, 'video recording', 'recorded_videos');
    }

    public function submitTextComplaint(Request $request)
    {
        info($request);
        $validator = Validator::make($request->all(), [
            'complaint_text' => 'required|string|max:5000',
            // Add other fields like user_id, etc.
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // TODO: Save the text complaint to your database
        // Example:
        // $complaint = Complaint::create([
        //     'user_id' => auth()->id(), // if authenticated
        //     'type' => 'text',
        //     'content' => $request->input('complaint_text'),
        //     'status' => 'submitted',
        // ]);

        return response()->json([
            'success' => true,
            'message' => 'Text complaint submitted successfully.',
            // 'complaint_id' => $complaint->id, // if saved
        ], 201);
    }

    public function complaints(Request $request)
    {
        info($request);
    }
}
