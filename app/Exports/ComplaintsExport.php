<?php

namespace App\Exports;

use App\Models\Complaint;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use App\Exports\CustomValueBinder;


// class ComplaintsExport implements FromCollection, WithHeadings, WithMapping, WithEvents
class ComplaintsExport extends CustomValueBinder implements FromCollection, WithHeadings, WithMapping, WithEvents,WithCustomValueBinder

{
    protected $status;
    protected $period;

    public function __construct($status = null, $period = null)
    {
        $this->status = $status;
        $this->period = $period;
    }

    public function collection()
    {
        $query = Complaint::with('user.bioData');

        if ($this->status) {
            $query->where('status', $this->status);
        }

        if ($this->period === 'date') {
            $query->whereDate('created_at', now());
        } elseif ($this->period === 'week') {
            $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
        } elseif ($this->period === 'month') {
            $query->whereMonth('created_at', now()->month)
                  ->whereYear('created_at', now()->year);
        } elseif ($this->period === 'year') {
            $query->whereYear('created_at', now()->year);
        }

        return $query->latest()->get();
    }

    public function map($complaint): array
    {   
        $year = $complaint->created_at?->format('Y') ?? '0000';
        $month = $complaint->created_at?->format('m') ?? '00';
        $formattedId = "{$year}{$complaint->id}{$month}";
        return [
            $formattedId,
            $complaint->user->name ?? 'N/A', 
            $complaint->user->phone ?? 'N/A',  // ✅ No apostrophe needed now
            $complaint->user->email ?? 'N/A', 
            optional($complaint->user->bioData)->gender ?? 'N/A',
            optional($complaint->user->bioData)->country ?? 'N/A',
            optional($complaint->user->bioData)->company ?? 'N/A',
            $complaint->type ?? 'N/A',
            $complaint->location->longitude ?? 'N/A',
            $complaint->location->latitude ?? 'N/A',
            $complaint->status ?? 'N/A',
            optional($complaint->user->bioData)->next_of_kin ?? 'N/A',
            optional($complaint->user->bioData)->next_of_kin_phone ?? 'N/A',  // ✅ Remove apostrophe
            $complaint->created_at?->format('M j, Y g:i A') ?? 'N/A',
        ];
    }

    public function headings(): array
    {
        return ['ID', 'Sent By','Phone Number','Email', 'Gender','Country','Company','Type', 'Longitudes','Latitude','Status', 'Next of Kin','Next of Kin Contact', 'Received On'];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
    
                // Insert 2 rows at the top to make space for the title and subtitle
                $sheet->insertNewRowBefore(1, 2);
    
                // Merge cells across the heading columns (A to L)
                $sheet->mergeCells('A1:L1');
                $sheet->mergeCells('A2:L2');
    
                // Set title in A1
                $sheet->setCellValue('A1', 'TULIWAMU');
                $sheet->getStyle('A1')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 16,
                        'color' => ['rgb' => '000000'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
    
                // Set subtitle in A2
                $sheet->setCellValue('A2', 'In Distress, We Respond');
                $sheet->getStyle('A2')->applyFromArray([
                    'font' => [
                        'italic' => true,
                        'size' => 12,
                        'color' => ['rgb' => '555555'],
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
    
                // Style the actual heading row (now row 3)
                $sheet->getStyle('A3:N3')->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'size' => 12,
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                    ],
                ]);
            },
        ];
    }
    
}
