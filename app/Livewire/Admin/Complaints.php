<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Complaint;

class Complaints extends Component
{
    public function render()   
    {
        return view('livewire.admin.complaints',[
            'complaints' => Complaint::getComplaint()
        ]);
    }
}
