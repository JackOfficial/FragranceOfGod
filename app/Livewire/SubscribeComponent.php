<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Validator;

class SubscribeComponent extends Component
{
    public $email = '';
    public $successMessage = '';

    public function subscribe()
    {
        // Validate email
        $validatedData = Validator::make(
            ['email' => $this->email],
            ['email' => 'required|email|unique:subscribers,email']
        )->validate();

        // Create subscriber
        Subscriber::create([
            'email' => $validatedData['email'],
            'status' => 'active', // automatically mark active
        ]);

        // Clear input
        $this->email = '';

        // Success message
        $this->successMessage = 'Subscribed successfully!';
    }

    public function render()
    {
        return view('livewire.subscribe-component');
    }
}
