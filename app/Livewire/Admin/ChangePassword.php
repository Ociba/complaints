<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ChangePassword extends Component
{
    public $password;
    public $password_confirmation;

    // Valipickup_amount
    protected $rules = [
        'password' => 'required',
        'password_confirmation' => 'required|same:password',
    ];

    // Customize validation error messages
    protected $messages = [
        'password.required' => 'Password is required',
        'password_confirmation.required' => 'Matching the password is required',
    ];

    public function changePassword(){
        $this->validate();

        try {
            User::changePassword($this->password);
            Auth::logout(); // Logout the user after password change
            session()->flash('message', 'Password changed successfully. Please login again.');
            return redirect()->to('/login');
        } catch (\Exception $e) {
            session()->flash('error', 'Error changing password: '.$e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.change-password');
    }
}
