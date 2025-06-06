<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class UploadService
{
    public function uploadComplaintFile($file, string $subDirectory)
    {
        // Generate a unique filename
        $fileName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
            . '_' . time() . '.' . $file->getClientOriginalExtension();

        // Define the full path where the file will be stored within the public directory
        $destinationPath = "complaints/{$subDirectory}";

        // Ensure the directory exists within the public folder
        // This is crucial because `storeAs` might not create nested public directories if the root isn't configured for it.
        // However, if `public_path()` is set as root, `storeAs` should handle this.
        // For absolute certainty, you can explicitly create the directory:
        if (!File::isDirectory(public_path($destinationPath))) {
            File::makeDirectory(public_path($destinationPath), 0755, true, true);
        }

        // Store in 'public/complaints/{subDirectory}'
        // The 'public' disk now points to your public directory
        $path = $file->storeAs(
            $destinationPath, // This will be e.g., "complaints/recorded_audio"
            $fileName,
            'public' // This still refers to the 'public' disk as defined in filesystems.php
        );

        return [
            'path' => $path, // This will be e.g., "complaints/recorded_audio/your_file.m4a"
            'filename' => $fileName,
            'original_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
        ];
    }
}
