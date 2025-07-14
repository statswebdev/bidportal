<?php

namespace App\Livewire\Bids;

use App\Models\Bid;
use Livewire\Component;
use Livewire\WithFileUploads;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CreateBid extends Component
{
    use WithFileUploads;

    public $description;
    public $description_mv;
    public $iulaan_number;
    public $phone;
    public $submission_date;
    public $iulaan_pdf;
    public $info_sheet_pdf;
    public $spec_sheet_pdf;
    public $supporting_docs;

    protected $rules = [
        'description' => 'required|string|max:255',
        'description_mv' => 'required|string|max:255',
        'iulaan_number' => 'required|string|max:50|unique:bids,iulaan_number',
        'phone' => 'required|string|max:20',
        'submission_date' => 'required|date',
        'iulaan_pdf' => 'required|file|mimes:pdf|max:2048', // Max 2MB
        'info_sheet_pdf' => 'required|file|mimes:pdf|max:2048', // Max 2MB
        'spec_sheet_pdf' => 'nullable|file|mimes:pdf|max:2048',
        'supporting_docs' => 'nullable|file|mimes:doc,docx|max:2048',
    ];

    protected function messages()
    {
        return [
            'description.required' => 'Description is required.',
            'description_mv.required' => 'Dhivehi description is required.',
        ];
    }

    public function updatedIulaanPdf()
    {
        $this->validateOnly('iulaan_pdf');
    }

    public function updatedInfoSheetPdf()
    {
        $this->validateOnly('info_sheet_pdf');
    }

    public function updatedSpecSheetPdf()
    {
        $this->validateOnly('spec_sheet_pdf');
    }

    public function updatedSupportingDocs()
    {
        $this->validateOnly('supporting_docs');
    }

    public function submitBid()
    {
        $this->validate();

        try {
            $slug = str_replace(' ', '_', $this->iulaan_number ?? uniqid());

            // Iulaan PDF
            $iulaanPdfPath = null;
            if ($this->iulaan_pdf) {
                $iulaanFilename = $slug . '_iulaan.pdf';
                $iulaanPdfPath = $this->iulaan_pdf->storeAs('bids/iulaan', $iulaanFilename, 'public');
            }

            // Info Sheet PDF
            $infoSheetPdfPath = null;
            if ($this->info_sheet_pdf) {
                $infoSheetFilename = $slug . '_info_sheet.pdf';
                $infoSheetPdfPath = $this->info_sheet_pdf->storeAs('bids/info-sheets', $infoSheetFilename, 'public');
            }

            // Spec Sheet PDF
            $specSheetPdfPath = null;
            if ($this->spec_sheet_pdf && $this->spec_sheet_pdf->getClientOriginalExtension() === 'pdf') {
                $specSheetFilename = $slug . '_spec_sheet.pdf';
                $specSheetPdfPath = $this->spec_sheet_pdf->storeAs('bids/spec-sheets', $specSheetFilename, 'public');
            }

            // Supporting Docs
            $supportingDocsPath = null;
            if ($this->supporting_docs && in_array($this->supporting_docs->getClientOriginalExtension(), ['doc', 'docx'])) {
                $supportingDocsFilename = $slug . '_supporting_docs.' . $this->supporting_docs->getClientOriginalExtension();
                $supportingDocsPath = $this->supporting_docs->storeAs('bids/supporting-docs', $supportingDocsFilename, 'public');
            }

            // Store the uploaded files
            // $iulaanPdfPath = $this->iulaan_pdf->store('bids/iulaan', 'public');
            // $infoSheetPdfPath = $this->info_sheet_pdf->store('bids/info-sheets', 'public');

            // $specSheetPdfPath = null;
            // if ($this->spec_sheet_pdf && $this->spec_sheet_pdf->getClientOriginalExtension() === 'pdf') {
            //     $specSheetPdfPath = $this->spec_sheet_pdf->store('bids/spec-sheets', 'public');
            // }

            // $supportingDocsPath = null;
            // if ($this->supporting_docs && in_array($this->supporting_docs->getClientOriginalExtension(), ['doc', 'docx'])) {
            //     $supportingDocsPath = $this->supporting_docs->store('bids/supporting-docs', 'public');
            // }

            // Create a new bid entry
            Bid::create([
                'description' => $this->description,
                'description_mv' => $this->description_mv,
                'iulaan_number' => $this->iulaan_number,
                'phone' => $this->phone,
                'submission_date' => $this->submission_date,
                'iulaan_pdf' => $iulaanPdfPath,
                'info_sheet_pdf' => $infoSheetPdfPath,
                'spec_sheet_pdf' => $specSheetPdfPath,
                'supporting_docs' => $supportingDocsPath,
            ]);

            // Clear form fields
            $this->reset();

            // Flash success message
            session()->flash('success', 'Bid created successfully.');
            return redirect()->route('dashboard');
        } catch (ValidationException $e) {
            $this->reset('spec_sheet_pdf', 'supporting_docs');
            throw $e;
        } catch (Exception $e) {
            logger()->error('Bid creation failed: ' . $e->getMessage());
            session()->flash('error', 'Failed to create bid. Please try again.');
        }
    }



    public function mount()
    {
        if (Auth::user() && Auth::user()->role === 'admin') {
            return redirect()->route('dashboard');
        }
    }


    public function render()
    {
        return view('livewire.bids.create-bid');
    }
}
