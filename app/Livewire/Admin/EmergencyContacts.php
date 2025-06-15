<?php

namespace App\Livewire\Admin;

use App\Models\EmergencyContact;
use Livewire\Component;

class EmergencyContacts extends Component
{
    protected $listeners = ['EmergencyContacts' => '$refresh'];

    public function render()
    {
        return view('livewire.admin.emergency-contacts',[
            'emergency_contacts' =>EmergencyContact::getEmergencyContacts()
        ]);
    }
    public function deleteEmergencyContact($id){
        EmergencyContact::whereId($id)->delete();
        session()->flash('success', 'Deleted added successfully.');
        return redirect()->to('/admin/emergency-contacts');
    }
}
