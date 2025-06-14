<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Cell\DefaultValueBinder;

class CustomValueBinder extends DefaultValueBinder
{
    public function bindValue(Cell $cell, $value)
    {
        // Force phone numbers to be stored as strings
        if (is_string($value) && str_starts_with($value, '+')) {
            $cell->setValueExplicit($value, DataType::TYPE_STRING);
            return true;
        }

        return parent::bindValue($cell, $value);
    }
    
}
