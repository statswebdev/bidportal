<div>
    <x-slot name="title">MBS Bid Portal - View Bid Registrations</x-slot>

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
                        <div>{{ session('registered') }}</div>
                    </div>
                @endif
            </div>
            <!-- row -->
            <div class="col-12">
                <div class="border-bottom pb-3 mb-3 d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-column gap-1">
                        <h1 class="mb-0 h2 fw-bold">Bid Registrations</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{ Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'staff') ? route('dashboard') : route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">View Bid Registrations for
                                    {{ $bid->description }}</li>
                            </ol>
                        </nav>
                    </div>
                    @auth
                    <div class="text-end">
                        <button id="downloadPDF" class="btn btn-info">Download List</button>
                    </div>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">

                    <!-- table  -->
                    <div class="table-responsive pb-5">

                        <table class="table table-hover text-nowrap mb-0 table-centered datatable" id="bidsTable">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Business Name</th>
                                    <th>Business Registration Number</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($registrations as $registration)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ ucfirst($registration->type) }}</td>
                                        <td>{{ $registration->full_name }}</td>
                                        <td>{{ $registration->email }}</td>
                                        <td>{{ $registration->phone }}</td>
                                        <td>{{ $registration->company_name ?? '-' }}</td>
                                        <td>{{ $registration->company_registration_number ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </section>

<script>const bidDescription = @json($bid->description); const iulaanNumber = @json($bid->iulaan_number); const logoUrl = "{{ asset('images/mbslogo2023.svg') }}";</script>

</div>
