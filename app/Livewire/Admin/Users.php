<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    public function render()
    {
        return view('livewire.admin.users',[
            'users' =>User::get()
        ]);
    }
}
