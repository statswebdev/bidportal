<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class Dashboard extends Component
{
    public $user;
    public $users = [];

    public function mount()
    {
        // Set the authenticated user's details
        $this->user = Auth::user();

        if (Auth::user()->role === 'admin' && request()->is('addbid')) {
            // Redirect to the dashboard route
            return redirect()->route('dashboard');
        }
        
        if (Auth::user() && Auth::user()->role === 'admin') {
            $this->users = User::all();
        }
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
