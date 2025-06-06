<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadService
{
    public function uploadComplaintFile($file, string $subDirectory)
    {
        // Generate a unique filename
        $fileName = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
            . '_' . time() . '.' . $file->getClientOriginalExtension();

        // Store in 'public/complaints/{subDirectory}'
        $path = $file->storeAs(
            "complaints/{$subDirectory}",
            $fileName,
            'public'
        );

        return [
            'path' => $path,
            'filename' => $fileName,
            'original_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
        ];
    }
}
