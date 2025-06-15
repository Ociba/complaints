<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $subject;
    public $feedback;

    public function __construct($name, $email, $subject, $feedback)
    {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->feedback = $feedback;
    }

    public function build()
    {
        return $this->subject($this->subject)
                    ->replyTo($this->email)
                    ->view('emails.feedback-received');
    }
}