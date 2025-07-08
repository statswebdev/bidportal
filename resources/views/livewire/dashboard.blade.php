<div>

    <section class="container mt-3">

        @if (session()->has('success'))
            <div class="alert alert-success d-flex align-items-center mb-3" role="alert" id="alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                    class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                    <path
                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                    </path>
                </svg>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="border-bottom pb-3 mb-3 d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-column gap-1">
                        <h1 class="mb-0 h2 fw-bold">Bid Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-6">

            <div class="col-lg-4 col-md-4 col-12">
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body d-flex flex-column gap-2">
                        <span class="fs-6 text-uppercase fw-semibold ls-md">Total Bids</span>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="lh-1 d-flex flex-column gap-1">
                                <h2 class="h1 fw-bold mb-0">{{ $totalBids }}</h2>
                            </div>
                            <div>
                                <span class="bg-light-primary icon-shape icon-xl rounded-3 text-dark-primary">
                                    <span class="fe fe-file-text fs-3 text-primary"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-12">
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body d-flex flex-column gap-2">
                        <span class="fs-6 text-uppercase fw-semibold ls-md">Total Users</span>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="lh-1 d-flex flex-column gap-1">
                                <h2 class="h1 fw-bold mb-0">{{ $totalUsers }}</h2>
                            </div>
                            <div>
                                <span class="bg-light-success icon-shape icon-xl rounded-3 text-dark-success">
                                    <span class="fe fe-users fs-3 text-success"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-12">
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body d-flex flex-column gap-2">
                        <span class="fs-6 text-uppercase fw-semibold ls-md">Total Bid Registrations</span>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="lh-1 d-flex flex-column gap-1">
                                <h2 class="h1 fw-bold mb-0">{{ $totalBidRegistrations }}</h2>
                            </div>
                            <div>
                                <span class="bg-light-info icon-shape icon-xl rounded-3 text-dark-success">
                                    <span class="fe fe-folder fs-3 text-info"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>




    <livewire:bids.list-bids />

    @if (Auth::user()->role === 'admin')
        <livewire:staffs.list-staffs />
    @endif

    {{-- @if (Auth::user()->role === 'staff')
            <livewire:bids.list-bids />
        @endif

        @if (Auth::user()->role === 'admin')
            <livewire:bids.list-bids />
            <livewire:staffs.list-staffs />
        @endif --}}


    {{-- @if (Auth::user()->role === 'staff') 
            @if (Route::currentRouteName() === 'dashboard')
            <livewire:bids />
            @endif

            @if (Route::currentRouteName() === 'addbid')
            <livewire:addbid />
            @endif

        @elseif (Auth::user()->role === 'admin')
            <livewire:manageusers />
            <livewire:bids />
        @endif --}}

        <x-slot name="title">MBS Bid Portal - Dashboard</x-slot>
    </section>
</div>
