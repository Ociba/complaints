<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Complaint;

class MemberBioData extends Model
{
    protected $table = 'member_bio_data';
    protected $primaryKey = 'id';

    protected $fillable = ['user_id','country','company','gender','next_of_kin','next_of_kin_phone'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getUsers(){
        return MemberBioData::with('user')->latest()->get();
    }

    public static function getUsersDetails($userId){
        return MemberBioData::with('user')->whereUserId($userId)->get();
    }

    public static function countPendingComplaints($userId){
        return  Complaint::whereUserId($userId)->whereStatus('pending')->count();
    }

    public static function countEmergencyComplaints($userId){
        return  Complaint::whereUserId($userId)->whereStatus('emergency')->count();
    }

    public static function countResolvedComplaints($userId){
        return  Complaint::whereUserId($userId)->whereStatus('resolved')->count();
    }

    public static function countTextComplaintType($userId){
        return  Complaint::whereUserId($userId)->whereType('text')->count();
    }

    public static function countAudioComplaintType($userId){
        return  Complaint::whereUserId($userId)->whereType('audio')->count();
    }

    public static function countVideoComplaintType($userId){
        return  Complaint::whereUserId($userId)->whereType('video')->count();
    }

    public static function getUserComplaints($userId){
        return  Complaint::with('fileComplaint')->whereUserId($userId)->get();
    }

}
