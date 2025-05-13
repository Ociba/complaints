<?php

namespace App\Http\Controllers;

use App\Models\SystemSetting;
use App\Models\User;
use Illuminate\Http\Request;

class SystemSettingController extends Controller
{
    public function show($complaintFeeId){
        $setting =SystemSetting::whereId($complaintFeeId)->first();
        return view('admin.settings.update_complaint_fees_form',compact('setting'));
    }
    /**
     * Update the specified fee in storage.
     */
    public function update(Request $request, $complaintFeeId )
    {
        $setting  =SystemSetting::where('id',$complaintFeeId );
        $setting->update([
            'complaint_fee' => $request->complaint_fee,
        ]);
        return redirect('/admin/settings/complaint_fee')->with('success', 'Complaint Fee Updated Successfully!');
    }

    public function complaintFee(){
        $fees =SystemSetting::get();
        return view('admin.settings.fees',compact('fees'));
     }

     public function systemUser(){
        $users =User::get();
        return view('admin.settings.users', compact('users'));
     }
}
