<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Bid;
use App\Models\BidRegistration;

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
        $totalBids = Bid::count();
        $totalUsers = User::count();
        $totalBidRegistrations = BidRegistration::count();

        return view('livewire.dashboard',[
            'totalBids' => $totalBids,  
            'totalUsers' => $totalUsers, 
            'totalBidRegistrations' => $totalBidRegistrations,
        ]);
    }
}
