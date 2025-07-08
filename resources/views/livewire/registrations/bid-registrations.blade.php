<div>
    <x-slot name="title">MBS Bid Portal - Register for Bid</x-slot>

    @if (!Auth::check())
    <livewire:inc.navbar />
    @endif
    <section class="container mt-3">
        <div class="row">
            <div class="col-12">
                @if (session()->has('registered'))
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                        </path>
                    </svg>
                    <div>{{session('registered')}}</div>
                </div>
                @endif
                @if (session()->has('registered'))
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>{{session('warning')}}</div>
                </div>
                @endif
            </div>
            <!-- row -->
            <div class="col-12">
                <div class="border-bottom pb-3 mb-3 d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-column gap-1">
                      <h1 class="mb-0 h2 fw-bold">Register for Bid</h1>
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="{{ Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'staff') ? route('dashboard') : route('home') }}">Home</a></li>
                          <li class="breadcrumb-item active" aria-current="page">Register for Bid {{ $bid->description }}</li>
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
                            <h3 class="mb-0">Fill the Bid Registration Information</h3>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                            <!-- Form -->
                            <form wire:submit.prevent="submitBidReg" class="row">
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="fname">Bid Description</label>
                                    <input type="text" id="fname" class="form-control" value="{{ $bid->description }}" wire:model="description" disabled>
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="lname">Iulaan Number</label>
                                    <input type="text" id="lname" class="form-control" value="{{ $bid->iulaan_number }}" wire:model="iulaan_number" disabled>
                                </div>
                                <!-- radio-->
                                <label class="form-label" for="lname">Business/Individual</label>
                                <div class="mb-3 col-12 col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model.live="type" value="business" id="business" required>
                                        <label class="form-check-label" for="business">Business</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" wire:model.live="type" value="individual" id="individual">
                                        <label class="form-check-label" for="individual">Individual</label>
                                    </div>
                                    @error('type')<div class="invalid-feedback d-flex">{{ $message }}</div>@enderror
                                </div>
                                <div class="mb-3 col-12 col-md-12">
                                    <label class="form-label" for="fullname">Full Name</label>
                                    <input type="text" id="fullname" class="form-control" placeholder="Full Name" wire:model="full_name">
                                    @error('full_name')<div class="invalid-feedback d-flex">{{ $message }}</div>@enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="email">Email Address</label>
                                    <input type="email" id="email" class="form-control" placeholder="info@gmail.com" wire:model="email">
                                    @error('email')<div class="invalid-feedback d-flex">{{ $message }}</div>@enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="phone">Phone Number</label>
                                    <input type="text" id="phone" class="form-control" placeholder="Phone" wire:model="phone">
                                    @error('phone')<div class="invalid-feedback d-flex">{{ $message }}</div>@enderror
                                </div>
                                @if($type === 'business')
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="companyname">Business Name</label>
                                    <input type="text" id="companyname" class="form-control" placeholder="Business Name" wire:model="company_name">
                                    @error('company_name')<div class="invalid-feedback d-flex">{{ $message }}</div>@enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="companyregno">Business Registration Number</label>
                                    <input type="text" id="companyregno" class="form-control" placeholder="Business Reg No:" wire:model="company_registration_number">
                                    @error('company_registration_number')<div class="invalid-feedback d-flex">{{ $message }}</div>@enderror
                                </div>
                                @endif
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
