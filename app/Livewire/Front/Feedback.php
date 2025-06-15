<?php

namespace App\Livewire\Front;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\FeedbackReceived;

class Feedback extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;
    
    public $isSending = false;
    public $successMessage = '';
    public $errorMessage = '';

    protected $rules = [
        'name' => 'required|min:3|max:100',
        'email' => 'required|email:rfc,dns|max:100',
        'subject' => 'required|min:5|max:200',
        'message' => 'required|min:10|max:2000',
    ];

    public function submit()
    {
        $this->validate();
        $this->isSending = true;
        
        try {
            $recipients = [
                'ocibajames@gmail.com', // Primary recipient
                'julisema4@gmail.com'   // Additional recipient
                // 'third@example.com'      Another recipient
            ];
            
            // Send to all recipients in one go
            Mail::to($recipients)
                ->send(new FeedbackReceived(
                    $this->name,
                    $this->email,
                    $this->subject,
                    $this->message
                ));
                
            $this->reset(['name', 'email', 'subject', 'message']);
            return redirect()->to('/feedback')->with('success', 'Your message has been sent. Thank you!');
            
            
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an error sending your message.');
        }
        
        $this->isSending = false;
    }

    public function render()
    {
        return view('livewire.front.feedback');
    }
}