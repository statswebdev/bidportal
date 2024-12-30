<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->flash('success', 'Logged In Successfully');
            return redirect()->route('dashboard');
        } else {
            //session()->flash('error', 'Email or Password is incorrect!');
            return redirect('/login')->with('error', 'Email or Password is Incorrect!');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
