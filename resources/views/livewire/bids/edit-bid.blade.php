<div>
    <x-slot name="title">MBS Bid Portal - Edit Bid</x-slot>

    <section class="container mt-3">

        <div class="row">
            <div class="col-12">
                @if (session()->has('updated'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                            </path>
                        </svg>
                        <div>{{ session('updated') }}</div>
                    </div>
                @endif
            </div>
            <!-- row -->
            <div class="col-12">
                <div class="border-bottom pb-3 mb-3 d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-column gap-1">
                        <h1 class="mb-0 h2 fw-bold">Edit Bid</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('bids') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Bid {{ $bid->description }}
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="container">
        <div class="row">
            <!-- row -->
            <div class="col-12">
                <!-- Card -->
                <div class="card mb-4">
                    <!-- Card Header -->
                    <div class="card-header">
                        <h3 class="mb-0">Update bid information</h3>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Form -->
                        <form wire:submit.prevent="updateBid" class="row">
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="fname">Bid Description</label>
                                <input type="text" id="fname" class="form-control" placeholder="Bid Description"
                                    wire:model="description">
                                @error('description')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="description_mv">Bid Description (Dhivehi)</label>
                                <input type="text" id="description_mv" dir="rtl"
                                    class="form-control mvtypewriter thaana" placeholder="ބިޑްގެ ނަން"
                                    wire:model.debounce.300ms="description_mv">
                                @error('description_mv')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-12">
                                <label class="form-label" for="lname">Iulaan Number</label>
                                <input type="text" id="lname" class="form-control" placeholder="Iulaan Number"
                                    wire:model="iulaan_number">
                                @error('iulaan_number')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input type="text" id="phone" class="form-control" placeholder="Phone"
                                    wire:model="phone">
                                @error('phone')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="lname">Bid Registration Deadline</label>
                                <input type="datetime-local" id="selectDate"
                                    class="form-control"placeholder="Bid Submission Date" wire:model="submission_date">
                                @error('submission_date')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Iulaan PDF -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="iulaan_pdf">Iulaan (PDF)</label>
                                <input type="file" id="iulaan_pdf" class="form-control" wire:model="iulaan_pdf">
                                @if ($currentIulaanPdf)
                                    <small>Current File: <a href="{{ Storage::url($currentIulaanPdf) }}"
                                            target="_blank">View PDF</a></small>
                                @endif
                                @error('iulaan_pdf')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Info Sheet PDF -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="info_sheet_pdf">Information Sheet (PDF)</label>
                                <input type="file" id="info_sheet_pdf" class="form-control"
                                    wire:model="info_sheet_pdf">
                                @if ($currentInfoSheetPdf)
                                    <small>Current File: <a href="{{ Storage::url($currentInfoSheetPdf) }}"
                                            target="_blank">View PDF</a></small>
                                @endif
                                @error('info_sheet_pdf')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Spec Sheet PDF -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="spec_sheet_pdf">Specification Sheet (PDF)</label>
                                <input type="file" id="spec_sheet_pdf" class="form-control"
                                    wire:model="spec_sheet_pdf">
                                @if ($spec_sheet_pdf)
                                    <button type="button" wire:click="$set('spec_sheet_pdf', null)"
                                        class="btn btn-sm btn-outline-danger mt-2">
                                        Clear File
                                    </button>
                                @endif    
                                @if ($currentSpecSheetPdf)
                                    <small>Current File: <a href="{{ Storage::url($currentSpecSheetPdf) }}"
                                            target="_blank">View PDF</a></small>
                                @endif
                                @error('spec_sheet_pdf')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <!-- Supporting Docs -->
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="supporting_docs">Supporting Documents (Word
                                    Only)</label>
                                <input type="file" id="supporting_docs" class="form-control"
                                    wire:model="supporting_docs">
                                @if ($supporting_docs)
                                    <button type="button" wire:click="$set('supporting_docs', null)"
                                        class="btn btn-sm btn-outline-danger mt-2">
                                        Clear File
                                    </button>
                                @endif
                                @if ($currentSupportingDocs)
                                    <small>Current File: <a href="{{ Storage::url($currentSupportingDocs) }}"
                                            target="_blank">View PDF</a></small>
                                @endif
                                @error('supporting_docs')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <label class="form-label" for="lname">Bid Status</label>
                            <div class="mb-3 col-12 col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model="status"
                                        value="active" id="active">
                                    <label class="form-check-label" for="active">Active</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model="status"
                                        value="inactive" id="inactive">
                                    <label class="form-check-label" for="inactive">Inactive</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" wire:model="status"
                                        value="completed" id="completed">
                                    <label class="form-check-label" for="completed">Completed</label>
                                </div>
                                @error('status')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
