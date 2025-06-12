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
        $this->complaint = Complaint::getParticularComplaint($complaintId);

        // Debug the actual path
        if ($this->complaint->fileComplaint) {
            $path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR,
                public_path('complaints/recorded_videos/' . basename($this->complaint->fileComplaint->path)));
            
            if (!file_exists($path)) {
                logger()->error("Video file missing", [
                    'expected_path' => $path,
                    'stored_path' => $this->complaint->fileComplaint->path
                ]);
            }
        }
    }

    public function render()
    {
        return view('livewire.admin.print-complaint',[
            'details' => $this->complaint
        ]);
    }
}
