<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\MemberBioData;

class Users extends Component
{
    public function render()
    {
        return view('livewire.admin.users',[
            'users' =>MemberBioData::getUsers()
        ]);
    }
}
