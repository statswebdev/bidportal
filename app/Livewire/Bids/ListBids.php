<?php

namespace App\Livewire\Bids;

use App\Models\Bid;
use Livewire\Component;

class ListBids extends Component
{
    public $bids = [];

    public function mount()
    {
        $this->bids = Bid::all();
    }

    public function render()
    {
        return view('livewire.bids.list-bids');
    }
}
