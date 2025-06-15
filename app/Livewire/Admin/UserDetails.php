<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\MemberBioData;

class UserDetails extends Component
{
    public $userId;

    public function mount($userId){
        $this->userId =$userId;
    }

    public function render()
    {
        return view('livewire.admin.user-details',[
            'users'=>MemberBioData::getUsersDetails($this->userId)
        ]);
    }
}
