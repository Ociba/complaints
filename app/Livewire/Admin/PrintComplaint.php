<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Complaint;

class PrintComplaint extends Component
{
    public $complaintId;
    public $complaint;

    public function mount($complaintId)
    {
        $this->complaintId = $complaintId;
        $this->complaint = Complaint::with(['user.bioData', 'fileComplaint'])
        ->findOrFail($complaintId);

       
    }

    public function render()
    {
        return view('livewire.admin.print-complaint',[
            'details' => $this->complaint
        ]);
    }
}
