<?php

namespace App\Livewire\Front;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactUs extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;
    
    public $successMessage = '';
    public $errorMessage = '';
    public $isSending = false;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email:rfc,dns',
        'subject' => 'required|min:5',
        'message' => 'required|min:10',
    ];

    
    public function submitForm()
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
                ->send(new ContactFormMail(
                    $this->name,
                    $this->email,
                    $this->subject,
                    $this->message
                ));
                
            $this->resetForm();
            return redirect()->to('/')->with('success', 'Your message has been sent. Thank you!');
            
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an error sending your message.');
        }
        
        $this->isSending = false;
    }
    
    private function resetForm()
    {
        $this->reset(['name', 'email', 'subject', 'message']);
    }

    public function render()
    {
        return view('livewire.front.contact-us');
    }
}