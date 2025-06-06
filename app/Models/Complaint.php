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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fileComplaint()
    {
        return $this->belongsTo(FileComplaint::class, 'file_complaint_id');
    }
}
