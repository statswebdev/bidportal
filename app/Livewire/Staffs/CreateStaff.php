<?php

namespace App\Livewire\Staffs;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateStaff extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function createUser()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        session()->flash('created', 'User Created successfully');
        return redirect()->route('list-staff');

        //return redirect('/')->with('success', 'Registration successful');
    }

    public function render()
    {
        return view('livewire.staffs.create-staff');
    }
}
