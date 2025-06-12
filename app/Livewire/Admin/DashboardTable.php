<?php

namespace App\Livewire\Admin;

use App\Models\Complaint;
use Livewire\Component;

class DashboardTable extends Component
{
    public function render()
    {
        return view('livewire.admin.dashboard-table',[
            'complaints'=>Complaint::getTodaysComplaints()
        ]);
    }
}
