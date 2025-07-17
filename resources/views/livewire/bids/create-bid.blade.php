<div>
    <x-slot name="title">MBS Bid Portal - Create Bid</x-slot>
    <section class="container mt-6">
        <div class="row">
            <div class="col-12">
                @if (session()->has('created'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                            </path>
                        </svg>
                        <div>{{ session('created') }}</div>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <div>{{ session('error') }}</div>
                    </div>
                @endif
            </div>
            <!-- row -->
            <div class="col-12">
                <div class="border-bottom pb-3 mb-3 d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-column gap-1">
                        <h1 class="mb-0 h2 fw-bold">Create Bid</h1>
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
                        <h3 class="mb-0">Fill the bid information</h3>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <!-- Form -->
                        <form wire:submit.prevent="submitBid" class="row">
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="desc">Bid Description</label>
                                <input type="text" id="desc" class="form-control" placeholder="Bid Description"
                                    wire:model="description">
                                @error('description')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="descmv">Bid Description (Dhivehi)</label>
                                <input type="text" id="descmv" class="form-control thaana text-end mvtypewriter" placeholder="ބިޑްގެ ނަން" wire:model.debounce.300ms="description_mv">
                                @error('description_mv')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-12">
                                <label class="form-label" for="iulaan">Iulaan Number</label>
                                <input type="text" id="iulaan" class="form-control" placeholder="Iulaan Number"
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
                                <label class="form-label" for="regdate">Bid Registration Deadline</label>
                                <input type="datetime-local" id="regdate"
                                    class="form-control"placeholder="Bid Submission Date" wire:model="submission_date">
                                @error('submission_date')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="iulaanpdf">Iulaan (PDF)</label>
                                <div class="rounded-2 min-h-0">
                                    <input type="file" id="iulaanpdf" class="form-control" wire:model="iulaan_pdf" />
                                </div>
                                @error('iulaan_pdf')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="infopdf">Information Sheet (PDF)</label>
                                <div class="rounded-2 min-h-0">
                                    <input type="file" id="infopdf" class="form-control" wire:model="info_sheet_pdf" />
                                </div>
                                @error('info_sheet_pdf')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="specpdf">Specification Sheet (PDF)</label>
                                <div class="rounded-2 min-h-0">
                                    <input type="file" id="specpdf" class="form-control" wire:model="spec_sheet_pdf" />

                                    @if ($spec_sheet_pdf)
                                        <button type="button" wire:click="$set('supporting_docs', null)"
                                            class="btn btn-sm btn-outline-danger mt-2">
                                            Clear File
                                        </button>
                                    @endif
                                </div>
                                @error('spec_sheet_pdf')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label class="form-label" for="supportingpdf">Supporting Docs (Word only)</label>
                                <div class="rounded-2 min-h-0">
                                    <input type="file" id="supportingpdf" class="form-control" wire:model="supporting_docs" />

                                    @if ($supporting_docs)
                                        <button type="button" wire:click="$set('supporting_docs', null)"
                                            class="btn btn-sm btn-outline-danger mt-2">
                                            Clear File
                                        </button>
                                    @endif
                                </div>
                                @error('supporting_docs')
                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-12 col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
