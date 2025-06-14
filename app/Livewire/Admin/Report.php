<?php
namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Complaint;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ComplaintsReportExport;

class Report extends Component
{
    public $years = [];
    public $dataByYear = [];

    public function mount()
    {
        $currentYear = Carbon::now()->year;

        // Last 3 years: current year and previous two years
        $this->years = [
            $currentYear - 2,
            $currentYear - 1,
            $currentYear,
        ];

        // Fetch data for each year
        foreach ($this->years as $year) {
            $this->dataByYear[$year] = Complaint::getMonthlyStatusCounts($year);
        }
    }

    public function exportExcel()
    {
        return Excel::download(new ComplaintsReportExport($this->dataByYear), 'complaints_report.xlsx');
    }

    public function render()
    {
        return view('livewire.admin.report', [
            'years' => $this->years,
            'dataByYear' => $this->dataByYear,
        ]);
    }
}
