<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type', // e.g., 'text', 'audio', 'video'
        'content', // For text complaints
        'file_complaint_id', // Foreign key to FileComplaint
        'status', // e.g., 'pending', 'resolved'
    ];

    // User.php model
    public function bioData()
    {
        return $this->hasOne(MemberBioData::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class);
    }

    public function fileComplaint()
    {
        return $this->belongsTo(FileComplaint::class, 'file_complaint_id');
    }

    
    public function location()
    {
        return $this->hasOne(ComplaintLocation::class);
    }

    public static function getComplaint(){
        return Complaint::with('user.bioData','fileComplaint')->latest()->get();
    }

    public static function getParticularComplaint($complaintId){
        return Complaint::with('user.bioData','fileComplaint')
            //  ->whereId($complaintId)->get();
            ->findOrFail($complaintId);
    }

    // In Complaint model
    public function getMediaTypeAttribute()
    {
        if ($this->type === 'text') return 'text';
        if (!$this->fileComplaint) return null;
        
        return match($this->fileComplaint->file_type) {
            'audio_recording', 'audio' => 'audio',
            'video_file_upload', 'video' => 'video',
            default => 'file'
        };
    }
}
