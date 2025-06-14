<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Events\AfterSheet;

class ComplaintsReportExport implements FromArray, WithEvents
{
    use RegistersEventListeners;

    protected $dataByYear;

    public function __construct(array $dataByYear)
    {
        $this->dataByYear = $dataByYear;
    }

    public function array(): array
    {
        $excelData = [];

        foreach ($this->dataByYear as $year => $statuses) {
            $excelData[] = ["Complaints Report for Year $year"];
            $excelData[] = ['Status', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            foreach (['pending', 'resolved', 'total'] as $status) {
                $row = [$status];
                for ($m = 1; $m <= 12; $m++) {
                    $row[] = $statuses[$status][$m] ?? 0;
                }
                $excelData[] = $row;
            }

            $excelData[] = []; // empty row between years
        }

        return $excelData;
    }

    public static function afterSheet(AfterSheet $event)
    {
        $sheet = $event->sheet->getDelegate();
        $rowIndex = 1;

        // Style each title and heading row
        foreach ($sheet->toArray() as $row) {
            if (strpos($row[0], 'Complaints Report for Year') === 0) {
                // Merge and style the title row
                $sheet->mergeCells("A$rowIndex:M$rowIndex");
                $sheet->getStyle("A$rowIndex")->applyFromArray([
                    'font' => ['bold' => true, 'size' => 14],
                    'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
                ]);
            }

            if (isset($row[1]) && $row[0] === 'Status' && $row[1] === 'Jan') {
                // Style the column heading row
                $sheet->getStyle("A$rowIndex:M$rowIndex")->applyFromArray([
                    'font' => ['bold' => true],
                    'borders' => [
                        'bottom' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                        ],
                    ],
                ]);
            }

            $rowIndex++;
        }
    }
}
