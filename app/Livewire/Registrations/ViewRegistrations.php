<?php

namespace App\Livewire\Registrations;


use App\Models\Bid;
use App\Models\BidRegistration;
use Livewire\Component;


class ViewRegistrations extends Component
{
    public $bidId;

    // Automatically resolve the bidId parameter from the route
    public function mount($bidId)
    {
        $this->bidId = $bidId;
    }

    public function render()
    {
        // Fetch the bid model
        $bid = Bid::findOrFail($this->bidId);
        // Fetch the registrations related to the bid
        $registrations = BidRegistration::where('bid_id', $this->bidId)->get();

        return view('livewire.registrations.view-registrations', compact('bid', 'registrations'));
    }
}
