<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintLocation extends Model
{
    protected $table = 'complaint_locations';
    protected $fillable = ['complaint_id', 'latitude', 'longitude'];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class, 'complaint_id');
    }

    public static function locateComplaint($complaintId){
        return ComplaintLocation::with('complaint')
            ->whereComplaintId($complaintId)->first();
    }
}
