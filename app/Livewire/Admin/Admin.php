<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Admin extends Component
{
    public function render()
    {
        return view('livewire.admin.admin',[
            'admins'=>User::getAdmins()
        ]);
    }

    public function deleteAdmin($userId){
        User::whereId($userId)->delete();
        session()->flash('success', 'Deleted added successfully.');
        return redirect()->to('/admin/settings/system-admin');
    }
}
