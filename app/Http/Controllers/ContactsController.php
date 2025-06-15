<?php

namespace App\Http\Controllers;

class ContactsController extends Controller
{
    public function emergencyContacts(){
        return view('admin.contacts.emergency_contact');
    }

    public function clientTestimony(){
        return view('admin.contacts.client_testimony');
    }

    public function createTestimony(){
        return view('admin.contacts.create_testimony_form');
    }
}
