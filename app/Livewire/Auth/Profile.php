<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $user;
    public $name;
    public $email;
    public $avatar;
    

    public function mount()
    {
        $this->user = User::find(Auth::id());
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    protected function rules()
    {
        return [
            'name' => 'required|min:3',
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png|max:100',
        ];
    }

    public function updateProfile()
    {
        $this->validate();

        $this->user->name = $this->name;

        if ($this->avatar) {
            $avatarPath = $this->avatar->store('avatars', 'public');
            $this->user->avatar = $avatarPath;
        }
        
        $this->user->save();

        session()->flash('updated', 'Profile updated successfully.');
        return redirect()->route('profile');
    }

    public function render()
    {
        return view('livewire.auth.profile');
    }
}
