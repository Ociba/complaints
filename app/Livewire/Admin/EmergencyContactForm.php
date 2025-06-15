<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\EmergencyContact;

class EmergencyContactForm extends Component
{
    public $email;
    public $phone;
    public $receive_email = false;
    public $receive_sms = false;
    public $is_primary = false;
    public $additional_notes;
    public $priority;

    protected $rules = [
        'email' => 'required|email',
        'phone' => 'required',
        'receive_email' => 'boolean',
        'receive_sms' => 'boolean',
        'is_primary' => 'boolean',
        'priority' => 'required|integer',
        'additional_notes' => 'nullable|string',
    ];

    public function createEmergencyContact()
    {
        $this->validate();

        // Save to database
        EmergencyContact::create([
            'email' => $this->email,
            'phone' => $this->phone,
            'receive_email' => $this->receive_email,
            'receive_sms' => $this->receive_sms,
            'is_primary' => $this->is_primary,
            'additional_notes' => $this->additional_notes,
            'priority' => $this->priority,
        ]);

        $this->reset(['email', 'phone', 'receive_email', 'receive_sms', 'is_primary', 'additional_notes', 'priority']);
        session()->flash('success', 'Emergency Contact added successfully.');
        return redirect()->to('/admin/emergency-contacts');
    }

    public function render()
    {
        return view('livewire.admin.emergency-contact-form');
    }
}
