<?php

namespace App\Livewire\Inc;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;

class Navbar extends Component
{
    public $user;

    public function mount()
    {
        // Set the authenticated user's details
        $this->user = Auth::user();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.inc.navbar');
    }
}
