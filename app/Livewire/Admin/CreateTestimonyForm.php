<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ClientTestimony;
use Livewire\WithFileUploads;
use App\Traits\HandlesFileUploads;

class CreateTestimonyForm extends Component
{
    use WithFileUploads,HandlesFileUploads;

    public $name;
    public $work;
    public $statement;
    public $photo;

    protected $rules = [
        'name' => 'required|string|max:255',
        'work' => 'required|string|max:255',
        'statement' => 'required|string',
        'photo' => 'required|image|max:2048',
    ];

    public function createTestimony()
    {
        $this->validate();

        $savedFileName = $this->saveToTestimonies($this->photo);


        // Save to database
        ClientTestimony::create([
            'name' => $this->name,
            'work' => $this->work,
            'statement' => $this->statement,
            'photo' => $savedFileName,
        ]);

        $this->reset(['name', 'work', 'statement', 'photo']);
        session()->flash('success', 'Testimony added successfully.');
        return redirect()->to('/admin/client-testimony');
    }

    public function render()
    {
        return view('livewire.admin.create-testimony-form');
    }
}