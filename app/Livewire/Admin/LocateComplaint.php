<?php

namespace App\Livewire\Admin;

use App\Models\ComplaintLocation;
use Livewire\Component; 

class LocateComplaint extends Component
{
    public $complaintId;
    public $location;

    public function mount($complaintId)
    {
        $this->complaintId = $complaintId;
        $this->location = ComplaintLocation::locateComplaint($complaintId);
        
    }

    public function render()
    {
        return view('livewire.admin.locate-complaint');
    }
}
