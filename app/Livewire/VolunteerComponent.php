<?php

namespace App\Livewire;

use App\Models\Volunteer;
use Livewire\Component;

class VolunteerComponent extends Component
{
    /* =========================
       Public properties (form fields)
    ========================= */
    public $name;
    public $email;
    public $phone;
    public $opportunity;
    public $message;

    /* =========================
       Validation rules
    ========================= */
    protected $rules = [
        'name'        => 'required|string|max:255',
        'email'       => 'required|email|max:255',
        'phone'       => 'required|string|max:30',
        'opportunity' => 'required|string|max:255',
        'message'     => 'nullable|string',
    ];

    /* =========================
       Store volunteer
    ========================= */
    public function store()
    {
        $this->validate();

        Volunteer::create([
            'name'        => $this->name,
            'email'       => $this->email,
            'phone'       => $this->phone,
            'opportunity' => $this->opportunity,
            'message'     => $this->message,
            'status'      => 'pending', // always pending from frontend
        ]);

        // Reset form
        $this->reset(['name', 'email', 'phone', 'opportunity', 'message']);

        // Flash success message
        session()->flash('success', 'Thank you for volunteering! We will contact you soon.');
    }

    public function render()
    {
        return view('livewire.volunteer-component');
    }
}
