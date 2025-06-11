<?php

namespace App\Livewire\Admin;

use App\Models\Complaint;
use Livewire\Component;

class ComplaintsDetails extends Component
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
        return view('livewire.admin.complaints-details', [
            'details' => $this->complaint
        ]);
    }
}