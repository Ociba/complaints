<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Payment extends Model
{
    protected $fillable =['user_id','amount','transaction_id','status','payment_method','paid_at'];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function complaint(): BelongsTo
    {
        return $this->belongsTo(Complaint::class);
    }

}


