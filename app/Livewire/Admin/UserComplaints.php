<?php

namespace App\Livewire\Admin;

use App\Models\Complaint;
use Livewire\Component;

class UserComplaints extends Component
{
    public $userId;
    public $status;

    public function mount($status,$userId)
    {
        $this->status = $status;
        $this->userId = $userId;
    }


    public function render()
    {
        return view('livewire.admin.user-complaints',[
            'complaints' =>$this->getUserComplaintByStatus()
        ]);
    }

    protected function getUserComplaintByStatus()
    {
        
            return Complaint::where('user_id', $this->userId)->where('status', $this->status)->latest()->get();
    }

}
