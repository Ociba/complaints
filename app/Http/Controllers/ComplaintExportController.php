<?php

namespace App\Http\Controllers;

use App\Exports\ComplaintsExport;
use Maatwebsite\Excel\Facades\Excel;

class ComplaintExportController extends Controller
{
    public function export($status = null, $period = null)
    {
        $fileName = 'complaints_' . ($status ?? 'all') . '_' . ($period ?? 'all') . '.xlsx';
        return Excel::download(new ComplaintsExport($status, $period), $fileName);
    }
}
