<?php

namespace App\Livewire\Bids;

use App\Models\Bid;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

class EditBid extends Component
{
    use WithFileUploads;

    public $bid;
    public $description;
    public $iulaan_number;
    public $phone;
    public $submission_date;
    public $iulaan_pdf;
    public $info_sheet_pdf;
    public $currentIulaanPdf;
    public $currentInfoSheetPdf;

    protected function rules()
    {
        return [
            'description' => 'required|min:3',
            'iulaan_number' => [
                'required',
                'string',
                'max:50',
                Rule::unique('bids', 'iulaan_number')->ignore($this->bid->id)
            ],
            'phone' => 'required|string|max:20',
            'submission_date' => 'required|date',
            'iulaan_pdf' => [
                Rule::when(!$this->currentIulaanPdf, 'required'),
                'nullable',
                'mimes:pdf',
                'max:3072'
            ],
            'info_sheet_pdf' => [
                Rule::when(!$this->currentInfoSheetPdf, 'required'),
                'nullable',
                'mimes:pdf',
                'max:3072'
            ]
        ];
    }

    public function mount($bidid)
    {
        $this->bid = Bid::findOrFail($bidid);
        
        // Load existing data
        $this->description = $this->bid->description;
        $this->iulaan_number = $this->bid->iulaan_number;
        $this->phone = $this->bid->phone;
        $this->submission_date = $this->bid->submission_date;
        $this->currentIulaanPdf = $this->bid->iulaan_pdf;
        $this->currentInfoSheetPdf = $this->bid->info_sheet_pdf;
    }

    public function updateBid()
    {
        $this->validate();

        // Handle iulaan PDF upload
        if ($this->iulaan_pdf) {
            // Delete old file if exists
            if ($this->bid->iulaan_pdf) {
                Storage::disk('public')->delete($this->bid->iulaan_pdf);
            }
            $iulaanPath = $this->iulaan_pdf->store('bids/iulaan', 'public');
            $this->bid->iulaan_pdf = $iulaanPath;
        }

        // Handle info sheet PDF upload
        if ($this->info_sheet_pdf) {
            // Delete old file if exists
            if ($this->bid->info_sheet_pdf) {
                Storage::disk('public')->delete($this->bid->info_sheet_pdf);
            }
            $infoSheetPath = $this->info_sheet_pdf->store('bids/info-sheets', 'public');
            $this->bid->info_sheet_pdf = $infoSheetPath;
        }

        // Update other fields
        $this->bid->description = $this->description;
        $this->bid->iulaan_number = $this->iulaan_number;
        $this->bid->phone = $this->phone;
        $this->bid->submission_date = $this->submission_date;

        $this->bid->save();

        session()->flash('updated', 'Bid updated successfully.');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.bids.edit-bid');
    }
}
