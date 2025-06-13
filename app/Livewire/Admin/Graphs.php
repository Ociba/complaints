<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Complaint;

class Graphs extends Component
{
    public function render()
    {
        $monthlyCounts = Complaint::getMonthlyComplaintCounts();

        $labels = $monthlyCounts->map(fn($item) => \Carbon\Carbon::create()->month($item['month'])->format('F'))->toArray();
        $pendingData = $monthlyCounts->pluck('pending')->toArray();
        $resolvedData = $monthlyCounts->pluck('resolved')->toArray();

        return view('livewire.admin.graphs',compact('labels', 'pendingData', 'resolvedData'));
    }
}
