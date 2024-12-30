<?php

namespace App\Livewire\Staffs;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class ListStaffs extends Component
{
    public $users = [];

    public function mount()
    {

        if (Auth::user() && Auth::user()->role === 'admin') {
            $this->users = User::all();
        }
    }
    public function render()
    {
        return view('livewire.staffs.list-staffs');
    }
}
