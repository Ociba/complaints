<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

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

    public static function getComplaintByStatus($status){
        return Complaint::with('user.bioData','fileComplaint')
        ->whereStatus($status)
        ->latest()->get();
    }

    public static function getParticularComplaint($complaintId){
        return Complaint::with('user.bioData','fileComplaint')
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

    public static function markComplaintResolved($complaintId){
        return Complaint::whereId($complaintId)->update([
            'status'=>'resolved'
        ]);
    }

    public static function getTodaysComplaints(){
        return Complaint::with('user.bioData','fileComplaint')
        ->whereCreatedAt(Carbon::today())
        ->latest()
        ->get();
    }

    public static function countPendingComplaints(){
        return Complaint::whereStatus('pending')->count();
    }

    public static function countResolvedComplaints(){
        return Complaint::whereStatus('resolved')->count();
    }

    public static function countTextComplaints(){
        return Complaint::whereType('text')->count();
    }

    public static function countAudioComplaints(){
        return Complaint::whereType('audio')->count();
    }

    public static function countVideoComplaints(){
        return Complaint::whereType('video')->count();
    }
    //comparing data in the graph
    public static function getMonthlyComplaintCounts()
    {
        $currentYear = now()->year;

        $months = range(1, 12); // Ensure we get all months, even if zero count

        $pending = Complaint::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $currentYear)
            ->where('status', 'pending')
            ->groupByRaw('MONTH(created_at)')
            ->pluck('count', 'month');

        $resolved = Complaint::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', $currentYear)
            ->where('status', 'resolved')
            ->groupByRaw('MONTH(created_at)')
            ->pluck('count', 'month');

        return collect($months)->map(function ($month) use ($pending, $resolved) {
            return [
                'month' => $month,
                'pending' => $pending[$month] ?? 0,
                'resolved' => $resolved[$month] ?? 0,
            ];
        });
    }
}
