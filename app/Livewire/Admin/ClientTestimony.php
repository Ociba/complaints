<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ClientTestimony as Testimony;

class ClientTestimony extends Component
{
    public function render()
    {
        return view('livewire.admin.client-testimony',[
            'testimonies' =>Testimony::getClientTestimony()
        ]);
    }

    public function markTestimonyAsApproved($TestimonyId){
        Testimony::whereId($TestimonyId)->update([
            'status' => 'approved'
        ]);
        session()->flash('success', 'Operation Successful');
        return redirect()->to('/admin/client-testimony');
    }
}
