<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Component;

class ForgotPassword extends Component
{
    public $email;

    // Validation rules for the email field
    protected $rules = [
        'email' => 'required|email',
    ];

    // Method to handle sending the reset link
    public function sendResetLink()
    {
        // Validate email input
        $this->validate();

        // Send password reset link
        $status = Password::sendResetLink(['email' => $this->email]);

        // Check the status and provide feedback
        if ($status === Password::RESET_LINK_SENT) {
            session()->flash('message', 'Reset link sent to your email.');
        } else {
            session()->flash('error', 'Error! Make sure the email address is correct');
        }
    }

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
