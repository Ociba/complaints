<?php

namespace App\Traits;

use Illuminate\Support\Facades\File;

trait HandlesFileUploads
{
    public function saveToTestimonies($photo)
    {
        $fileName = $photo->getClientOriginalName();
        $tempPath = $photo->getRealPath();
        $destinationDir = public_path('storage/testimonies');
        $destinationPath = $destinationDir . '/' . $fileName;

        // Ensure directory exists
        if (!File::exists($destinationDir)) {
            File::makeDirectory($destinationDir, 0755, true);
        }

        // If file already exists, you can handle as needed
        if (File::exists($destinationPath)) {
            // Optionally, add timestamp to avoid overwrite
            $fileName = time() . '_' . $fileName;
            $destinationPath = $destinationDir . '/' . $fileName;
        }

        // Move the file
        rename($tempPath, $destinationPath);

        return $fileName;
    }
}

