<?php

namespace App\Livewire\Bids;

use App\Models\Bid;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBid extends Component
{
    use WithFileUploads;

    public $description;
    public $iulaan_number;
    public $phone;
    public $submission_date;
    public $iulaan_pdf;
    public $info_sheet_pdf;

    protected $rules = [
        'description' => 'required|string|max:255',
        'iulaan_number' => 'required|string|max:50|unique:bids,iulaan_number',
        'phone' => 'required|string|max:20',
        'submission_date' => 'required|date',
        'iulaan_pdf' => 'required|file|mimes:pdf|max:3072', // Max 3MB
        'info_sheet_pdf' => 'required|file|mimes:pdf|max:3072', // Max 3MB
    ];

    public function submitBid()
    {
        $this->validate();

        // Store the uploaded files
        $iulaanPdfPath = $this->iulaan_pdf->store('bids', 'public');
        $infoSheetPdfPath = $this->info_sheet_pdf->store('bids', 'public');

        // Create a new bid entry
        Bid::create([
            'description' => $this->description,
            'iulaan_number' => $this->iulaan_number,
            'phone' => $this->phone,
            'submission_date' => $this->submission_date,
            'iulaan_pdf' => $iulaanPdfPath,
            'info_sheet_pdf' => $infoSheetPdfPath,
        ]);

        // Clear form fields
        $this->reset();

        // Flash success message
        session()->flash('created', 'Bid created successfully.');
    }


    public function render()
    {
        return view('livewire.bids.create-bid');
    }
}
