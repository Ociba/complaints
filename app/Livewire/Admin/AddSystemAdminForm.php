<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AddSystemAdminForm extends Component
{
    public $name;

    public $email;

    public $role = 'admin'; // Default role

    public $phone;

    public $password;

    public $password_confirmation;

    // Validate
    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|unique:users,phone',
        'role' => '', 
        'password' => 'required|min:8',
        'password_confirmation' => 'required|same:password',
    ];

    // Customize validation error messages
    protected $messages = [
        'name.required' => 'Full Name is required',
        'name.min' => 'Name must be at least 3 characters',
        'email.required' => 'Email is required',
        'email.email' => 'Invalid email format',
        'email.unique' => 'Email already exists',
        'phone.required' => 'Phone number is required',
        'phone.unique' => 'Phone number already registered',
        'role.required' => 'Role is required',
        'role.in' => 'Invalid role selected',
        'password.required' => 'Password is required',
        'password.min' => 'Password must be at least 8 characters',
        'password_confirmation.required' => 'Password confirmation is required',
        'password_confirmation.same' => 'Passwords do not match',
    ];

    public function createAdmin(){
        $this->validate();
        try {
            User::createAdminAccount(
                $this->name,
                $this->email,
                $this->phone,
                $this->role,
                $this->password
            );
            
            // Reset form fields
            $this->reset(['name', 'email','phone','password', 'password_confirmation'
            ]);
            
            // Show success message
            session()->flash('success', 'Admin account created successfully!');
            
        } catch (\Exception $e) {
            session()->flash('error', 'Error creating account: '.$e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.admin.add-system-admin-form');
    }
}
