<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Events\AfterSheet;

class UsersExport extends DefaultValueBinder implements FromCollection, WithMapping, WithHeadings, WithEvents, WithCustomValueBinder
{
    public function collection()
    {
        return User::select('name', 'phone', 'email')->get();
    }

    public function headings(): array
    {
        return ['Name', 'Phone', 'Email'];
    }

    public function map($user): array
    {
        return [
            $user->name ?? 'N/A',
            $user->phone ?? 'N/A',
            $user->email ?? 'N/A',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // Insert 2 empty rows at the top, pushing everything down
                $sheet->insertNewRowBefore(1, 2);

                // Now row 1 and 2 are empty, so:
                // Title on row 1
                $sheet->mergeCells('A1:C1');
                $sheet->setCellValue('A1', 'Users (Domestic Workers)');
                $sheet->getStyle('A1')->getFont()->setSize(14)->setBold(true);
                $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // Slogan on row 2
                $sheet->mergeCells('A2:C2');
                $sheet->setCellValue('A2', 'In Distress, We Respond');
                $sheet->getStyle('A2')->getFont()->setItalic(true)->setSize(12);
                $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // Style the headings row (now row 3 after insert)
                $sheet->getStyle('A3:C3')->getFont()->setBold(true);
                $sheet->getStyle('A3:C3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
            },
        ];
    }

    public function bindValue(Cell $cell, $value)
    {
        // Prevent scientific notation for phone column B
        if ($cell->getColumn() === 'B') {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);
            return true;
        }

        return parent::bindValue($cell, $value);
    }
}
