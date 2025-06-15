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
}
