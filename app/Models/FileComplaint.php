<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileComplaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'path',
        'file_type', // e.g., 'audio_recording', 'video_file_upload', 'attachment'
        'original_name',
        'mime_type',
        'size',
    ];

    public function complaint()
    {
        return $this->hasOne(Complaint::class, 'file_complaint_id');
    }
}
