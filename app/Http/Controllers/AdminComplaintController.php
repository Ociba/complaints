<?php

namespace App\Http\Controllers;
use App\Models\Complaint;


class AdminComplaintController extends Controller

{
    public function index(){
        return view('admin.complaints.all');
    }
    
    public function complaintDetails($complaintId){
        return view('admin.complaints.details',compact('complaintId'));
    }

    public function locateComplaint($complaintId){
        return view('admin.complaints.locate_complaint',compact('complaintId'));
    }
    public function resolve(Complaint $complaint)
    {
        // Update the complaint status
        $complaint->update([
            'status' => 'resolved'
        ]);

        // Redirect back with success message
        return back()->with('success', 'Complaint #'.$complaint->id.' has been marked as resolved!');
    }

    public function PrintComplaint($complaintId){
        return view('admin.complaints.print_complaint',compact('complaintId'));
    }
}
