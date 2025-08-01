<?php

namespace App\Livewire\Bids;

use App\Models\Bid;
use Livewire\Component;

class ListBids extends Component
{
    public $bids = [];
    public $pastbids = [];

    public function mount()
    {
        $this->bids = Bid::where('status', 'active')->orderBy('id', 'desc')->get();
        $this->pastbids = Bid::where('status', 'completed')->orderBy('id', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.bids.list-bids');
    }
}
