<?php

namespace App\Livewire\Admin;

use App\Models\ComplaintLocation;
use Livewire\Component;

class LocateComplaint extends Component
{
    public $complaintId;
    public $location;
    public $googleMapsUrl;

    public function mount($complaintId)
    {
        $this->complaintId = $complaintId;
        $this->location = ComplaintLocation::locateComplaint($complaintId);
        
        if ($this->location) {
            $this->googleMapsUrl = "https://www.google.com/maps?q={$this->location->latitude},{$this->location->longitude}";
        }
    }

    public function render()
    {
        return view('livewire.admin.locate-complaint');
    }
}