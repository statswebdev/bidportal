<?php

namespace App\Livewire\Registrations;

use Livewire\Component;
use App\Models\Bid;
use App\Models\BidRegistration;
use App\Services\SmsService;

class BidRegistrations extends Component
{
    public $bid;
    public $bidId;
    public $type;
    public $full_name;
    public $email;
    public $phone;
    public $company_name;
    public $company_registration_number;

    public function mount($bidId)
    {
        $this->bid = Bid::findOrFail($bidId);

        if (now()->gt($this->bid->submission_date)) {
            //abort(403, 'Bid registration is closed.');
            return redirect()->route('home');
        }

        $this->bidId = $bidId;
    }
    

    protected $rules = [
        'type' => 'required|in:individual,business',
        'full_name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string|max:15',
        'company_name' => 'nullable|required_if:type,business|string|max:255',
        'company_registration_number' => 'nullable|required_if:type,business|string|max:255',
    ];

    public function submitBidReg(SmsService $sms)
    {
        $this->validate();

        BidRegistration::create([
            'bid_id' => $this->bidId,
            'type' => $this->type,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'company_name' => $this->company_name,
            'company_registration_number' => $this->company_registration_number,
        ]);

        try {
            $sms->send($this->phone, "You have Registered for Bid {$this->bid->description}. Iulaan #{$this->bid->iulaan_number}. Thank you!");
        } catch (\Exception $e) {
            // Optional: log error or flash warning
            logger()->error('SMS failed: ' . $e->getMessage());
            session()->flash('warning', 'Registered, but SMS delivery failed.');
        }

        session()->flash('registered', 'You have successfully registered for this bid');
        return redirect()->route('viewregistrations', ['bidId' => $this->bidId]);
    }
    public function render()
    {
        $bid = Bid::findOrFail($this->bidId);
        return view('livewire.registrations.bid-registrations', [
            'bid' => $this->bid
        ]);
    }
}
