<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberBioData extends Model
{
    protected $table = 'member_bio_data';
    protected $primaryKey = 'id';

    protected $fillable = ['user_id','country','company','gender','next_of_kin','next_of_kin_phone'];
}
