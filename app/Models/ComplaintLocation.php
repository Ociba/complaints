<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintLocation extends Model
{
    protected $table = 'complaint_locations';
    protected $fillable = ['complaint_id', 'latitude', 'longitude'];
}
