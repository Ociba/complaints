<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SOSNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $sosData;

    public function __construct(array $sosData)
    {
        $this->sosData = $sosData;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('🚨 EMERGENCY ALERT: ' . $this->sosData['user'] . ' needs help!')
            ->markdown('emails.sos-alert', ['sosData' => $this->sosData]);
    }
}
