<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Complaint;

class ComplaintsType extends Component
{
    public $type;

    public function mount($type)
    {
        $this->type = $type;
    }

    public function render()
    {
        $complaints = Complaint::where('type', $this->type)->latest()->get();

        return view('livewire.admin.complaints-type', [
            'complaints' => $complaints,
        ]);
    }
}

