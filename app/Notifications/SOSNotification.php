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
        return ['mail']; // Only email for now
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('🚨 EMERGENCY ALERT: ' . $this->sosData['user'] . ' needs help!')
            ->greeting('EMERGENCY SOS ALERT')
            ->line('**' . $this->sosData['user'] . '** has triggered an emergency alert!')
            ->line('**Message:** ' . $this->sosData['message'])
            ->line('**Time:** ' . $this->sosData['time'])
            ->action('View Location on Map', $this->sosData['map_url'])
            ->line('Please respond immediately!')
            ->markdown('emails.sos-alert', ['sosData' => $this->sosData]);
    }
}
