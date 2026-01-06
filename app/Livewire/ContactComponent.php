<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactComponent extends Component
{
     public $name;
    public $email;
    public $subject;
    public $message;

    protected $rules = [
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ];

    public function submit()
    {
        $this->validate();

        Contact::create([
            'name'    => $this->name,
            'email'   => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        // Reset form
        $this->reset(['name', 'email', 'subject', 'message']);

        // Flash message
        session()->flash('success', 'Your message has been sent successfully!');
    }

    public function render()
    {
        return view('livewire.contact-component');
    }
}
