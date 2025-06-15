<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Complaint;

class UserComplaintType extends Component
{
    public $userId;
    public $type;

    public function mount($type,$userId)
    {
        $this->type = $type;
        $this->userId = $userId;
    }

    public function render()
    {
        return view('livewire.admin.user-complaint-type',[
            'complaints' =>$this->getUserComplaintByStatus()
        ]);
    }

    protected function getUserComplaintByStatus()
    {
        
            return Complaint::where('user_id', $this->userId)->where('type', $this->type)->latest()->get();
    }
}
