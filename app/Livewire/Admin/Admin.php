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

    public function deleteAdmin($id){
        User::whereId($id)->delete();
        session()->flash('success', 'Deleted Admin successfully.');
        return redirect()->to('/admin/settings/system-admin');
    }
}
