<?php

namespace App\Livewire\Staffs;

use Livewire\Component;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class EditStaff extends Component
{
    public $user;
    public $name;
    public $email;
    public $role;

    public function mount($userid)
    {
        if (Auth::user() && Auth::user()->role === 'staff') {
            return redirect()->route('dashboard');
        }

        $this->user = User::findOrFail($userid);
        
        // Load existing data
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->role = $this->user->role;
    }

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($this->user->id)
            ],
            'role' => 'required|in:admin,staff',
        ];
    }

    public function updateUser()
    {
        $this->validate();

        // Update other fields
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        $this->user->role = $this->role;

        $this->user->save();

        session()->flash('updated', 'User information updated successfully.');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.staffs.edit-staff');
    }
}
