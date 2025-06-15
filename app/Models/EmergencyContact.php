<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class EmergencyContact extends Model
{
    use Notifiable;

    protected $fillable = [
        'user_id',
        'email',
        'phone',
        'receive_email',
        'receive_sms',
        'is_primary',
        'additional_notes',
        'priority'
    ];

    protected $casts = [
        'receive_email' => 'boolean',
        'receive_sms' => 'boolean',
        'is_primary' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Route notifications for mail channel
    public function routeNotificationForMail()
    {
        return $this->receive_email ? $this->email : null;
    }

    // Route notifications for SMS channel (if added later)
    public function routeNotificationForSms()
    {
        return $this->receive_sms ? $this->phone : null;
    }

    public static function getEmergencyContacts(){
        return EmergencyContact::latest()->get();
    }
}
