<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use App\Models\User;

class Settings extends Component
{
    public $user;
    public $email;
    public $password;
    public $newpassword;
    public $newpassword_confirmation;

    public function mount()
    {
        $this->user = User::find(Auth::id());
        $this->email = $this->user->email;
    }

    protected function rules()
    {
        return [
            'password' => 'required|string',
            'newpassword' => 'required|string|min:6|confirmed',
        ];
    }

    protected function messages()
    {
        return [
            'newpassword.confirmed' => 'Your new password and confirmation do not match.',
            'newpassword.min' => 'The new password must be at least 6 characters.',
            'newpassword.required' => 'Please enter your new password.',
        ];
    }

    public function updateSettings()
    {
        $this->validate();

        $this->user = User::find(Auth::id());

        if (!Hash::check($this->password, $this->user->password)) {
            throw ValidationException::withMessages([
                'password' => 'Your current password is incorrect.',
            ]);
        }

        $this->user->password = Hash::make($this->newpassword);
        $this->user->save();

        // Clear fields after successful update
        $this->reset(['password', 'newpassword', 'newpassword_confirmation']);

        session()->flash('updated', 'Password updated successfully.');
        return redirect()->route('settings');
    }

    public function render()
    {
        return view('livewire.auth.settings');
    }
}
