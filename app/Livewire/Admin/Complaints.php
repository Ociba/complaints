<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Complaint;

class Complaints extends Component
{
    public $status;

    protected $listeners = ['Complaints' => '$refresh'];

    public function mount($status = null)
    {
        $this->status = $status;
    }

    public function render()
    {
        return view('livewire.admin.complaints', [
            'complaints' => $this->getFilteredComplaints()
        ]);
    }

    protected function getFilteredComplaints()
    {
        if ($this->status) {
            return Complaint::where('status', $this->status)->latest()->get();
        }

        return Complaint::latest()->get();
    }

    public function markComplaintAsResolved($complaintId)
    {
        Complaint::markComplaintResolved($complaintId);
        session()->flash('success', 'Operation Successful');
        return redirect()->to('/admin/complaints');
    }
}

