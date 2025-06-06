<?php

namespace App\Http\Controllers;
use App\Models\Complaint;


class AdminComplaintController extends Controller

{
    public function index(){
        $complaints = Complaint::with('user','payment')->get();
        return view('admin.complaints.all',compact('complaints'));
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
}
