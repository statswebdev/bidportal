<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Component;


class ResetPassword extends Component
{
    public $password;
    public $password_confirmation;
    public $token;
    public $email;

    // Mount method to get the token and email from the route
    public function mount($token, $email)
    {
        $this->token = $token;
        $this->email = $email; // Automatically set email from the route
    }

    // Validation rules
    protected $rules = [
        'password' => 'required|min:6|same:password_confirmation',
        'password_confirmation' => 'required|min:6',
    ];

    // Method to reset the password
    public function resetPassword()
    {
        // Validate input
        $this->validate();

        // Attempt to reset the password
        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user, $password) {
                // Update the password and log the user in
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        // Check the status and provide feedback
        if ($status == Password::PASSWORD_RESET) {
            session()->flash('success', 'Password successfully reset');
            return redirect()->route('login');
        } else {
            session()->flash('error', 'There was an issue with the password reset');
            return redirect()->route('login');
        }
    }

    public function render()
    {
        return view('livewire.auth.reset-password');
    }
}
