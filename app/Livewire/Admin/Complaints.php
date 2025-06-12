<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Complaint;

class Complaints extends Component
{
    protected $listeners = ['Complaints' => '$refresh'];

    public function render()   
    {
        return view('livewire.admin.complaints',[
            'complaints' => Complaint::getComplaint()
        ]);
    }

    public function markComplaintAsResolved($complaintId)
    {
        Complaint::markComplaintResolved($complaintId);
        session()->flash('success', 'Operation Succesful');
        // $this->dispatch('Complaints', 'refreshComponent');
        return redirect()->to('/admin/complaints');
    }
}
