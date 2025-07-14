<?php

namespace App\Livewire\Bids;

use App\Models\Bid;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EditBid extends Component
{
    use WithFileUploads;

    public $bid;
    public $description;
    public $description_mv;
    public $iulaan_number;
    public $phone;
    public $submission_date;
    public $iulaan_pdf;
    public $info_sheet_pdf;
    public $spec_sheet_pdf;
    public $supporting_docs;
    public $currentIulaanPdf;
    public $currentInfoSheetPdf;
    public $currentSpecSheetPdf;
    public $currentSupportingDocs;
    public $status;

    protected function rules()
    {
        return [
            'description' => 'required|min:3',
            'description_mv' => 'required|min:3',
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
            ],
            'spec_sheet_pdf' => 'nullable|mimes:pdf|max:3072',
            'supporting_docs' => 'nullable|mimes:doc,docx|max:3072',
            'status' => 'required|in:active,inactive,completed',
        ];
    }

    public function mount($bidid)
    {
        if (Auth::user() && Auth::user()->role === 'admin') {
            return redirect()->route('dashboard');
        }

        $this->bid = Bid::findOrFail($bidid);

        // Load existing data
        $this->description = $this->bid->description;
        $this->description_mv = $this->bid->description_mv;
        $this->iulaan_number = $this->bid->iulaan_number;
        $this->phone = $this->bid->phone;
        //$this->submission_date = $this->bid->submission_date;
        $this->submission_date = Carbon::parse($this->bid->submission_date)->format('Y-m-d\TH:i');
        $this->currentIulaanPdf = $this->bid->iulaan_pdf;
        $this->currentInfoSheetPdf = $this->bid->info_sheet_pdf;
        $this->currentSpecSheetPdf = $this->bid->spec_sheet_pdf;
        $this->currentSupportingDocs = $this->bid->supporting_docs;
        $this->status = $this->bid->status;
    }

    public function updateBid()
    {
        $this->validate();

        $slug = str_replace(' ', '_', $this->iulaan_number) . '_' . time();

        // Handle iulaan PDF upload
        if ($this->iulaan_pdf) {
            if ($this->bid->iulaan_pdf) {
                Storage::disk('public')->delete($this->bid->iulaan_pdf);
            }
            $iulaanFilename = $slug . '_iulaan.pdf';
            $iulaanPath = $this->iulaan_pdf->storeAs('bids/iulaan', $iulaanFilename, 'public');
            $this->bid->iulaan_pdf = $iulaanPath;
        }

        // Handle info sheet PDF upload
        if ($this->info_sheet_pdf) {
            if ($this->bid->info_sheet_pdf) {
                Storage::disk('public')->delete($this->bid->info_sheet_pdf);
            }
            $infoSheetFilename = $slug . '_info_sheet.pdf';
            $infoSheetPath = $this->info_sheet_pdf->storeAs('bids/info-sheets', $infoSheetFilename, 'public');
            $this->bid->info_sheet_pdf = $infoSheetPath;
        }

        // Handle spec sheet PDF upload
        if ($this->spec_sheet_pdf) {
            if ($this->bid->spec_sheet_pdf) {
                Storage::disk('public')->delete($this->bid->spec_sheet_pdf);
            }
            $specSheetFilename = $slug . '_spec_sheet.pdf';
            $specSheetPath = $this->spec_sheet_pdf->storeAs('bids/spec-sheets', $specSheetFilename, 'public');
            $this->bid->spec_sheet_pdf = $specSheetPath;
        }

        // Handle supporting docs upload
        if ($this->supporting_docs) {
            if ($this->bid->supporting_docs) {
                Storage::disk('public')->delete($this->bid->supporting_docs);
            }
            $supportingDocsFilename = $slug . '_supporting_docs.' . $this->supporting_docs->getClientOriginalExtension();
            $supportingdocsPath = $this->supporting_docs->storeAs('bids/supporting-docs', $supportingDocsFilename, 'public');
            $this->bid->supporting_docs = $supportingdocsPath;
        }

        // // Handle iulaan PDF upload
        // if ($this->iulaan_pdf) {
        //     // Delete old file if exists
        //     if ($this->bid->iulaan_pdf) {
        //         Storage::disk('public')->delete($this->bid->iulaan_pdf);
        //     }
        //     $iulaanPath = $this->iulaan_pdf->store('bids/iulaan', 'public');
        //     $this->bid->iulaan_pdf = $iulaanPath;
        // }

        // // Handle info sheet PDF upload
        // if ($this->info_sheet_pdf) {
        //     // Delete old file if exists
        //     if ($this->bid->info_sheet_pdf) {
        //         Storage::disk('public')->delete($this->bid->info_sheet_pdf);
        //     }
        //     $infoSheetPath = $this->info_sheet_pdf->store('bids/info-sheets', 'public');
        //     $this->bid->info_sheet_pdf = $infoSheetPath;
        // }

        // // Handle spec sheet PDF upload
        // if ($this->spec_sheet_pdf) {
        //     // Delete old file if exists
        //     if ($this->bid->spec_sheet_pdf) {
        //         Storage::disk('public')->delete($this->bid->spec_sheet_pdf);
        //     }
        //     $specSheetPath = $this->spec_sheet_pdf->store('bids/spec-sheets', 'public');
        //     $this->bid->spec_sheet_pdf = $specSheetPath;
        // }

        // // Handle supporting docs upload
        // if ($this->supporting_docs) {
        //     // Delete old file if exists
        //     if ($this->bid->supporting_docs) {
        //         Storage::disk('public')->delete($this->bid->supporting_docs);
        //     }
        //     $supportingdocsPath = $this->supporting_docs->store('bids/supporting-docs', 'public');
        //     $this->bid->supporting_docs = $supportingdocsPath;
        // }

        // Update other fields
        $this->bid->description = $this->description;
        $this->bid->description_mv = $this->description_mv;
        $this->bid->iulaan_number = $this->iulaan_number;
        $this->bid->phone = $this->phone;
        $this->bid->submission_date = $this->submission_date;
        $this->bid->status = $this->status;

        $this->bid->save();

        session()->flash('updated', 'Bid updated successfully.');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.bids.edit-bid');
    }
}
