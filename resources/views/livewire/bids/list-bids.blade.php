<div>
    <x-slot name="title">MBS Bid Portal - Bid List</x-slot>
    <section class="container mt-6">
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
                <!-- row -->
                <div class="col-md-12">
                    <!-- heading -->
                    <div class="border-bottom pb-3 mb-3 d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column gap-1">
                            <h1 class="mb-0 h2 fw-bold">Bid List</h1>
                        </div>
                        @if (Auth::check() && Auth::user()->role === 'staff')
                            <div class="text-end">
                                <a href="{{ route('bids.create') }}" class="btn btn-primary">Create Bid</a>
                            </div>
                        @endif
                    </div>
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
                        <table class="table table-hover text-nowrap mb-0 table-centered datatable" id="projectTable">
                            <thead class="table-light">
                                <tr>
                                    <th>Bid Description</th>
                                    <th>Iulaan Number</th>
                                    <th>Registration Deadline</th>
                                    <th>Files</th>
                                    <th>Status</th>
                                    <th>List</th>
                                    @if (Auth::check() && Auth::user()->role === 'staff')
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bids as $bid)
                                    <tr>
                                        <td><span>{{ $bid->description }}</span><br><span
                                                class="mvtypewriter ">{{ $bid->description_mv }}</span></td>
                                        <td>{{ $bid->iulaan_number }}</td>
                                        <td>{{ \Carbon\Carbon::parse($bid->submission_date)->format('d-m-Y H:i') }}</td>
                                        <td>
                                            <a href="{{ Storage::url($bid->iulaan_pdf) }}" target="_blank"><span
                                                    class="badge bg-primary-soft">Iulaan</span></a><br>
                                            <a href="{{ Storage::url($bid->info_sheet_pdf) }}" target="_blank"><span
                                                    class="badge bg-info-soft mt-2">Information Sheet</span></a>
                                            @if ($bid->spec_sheet_pdf)
                                                <br><a href="{{ Storage::url($bid->spec_sheet_pdf) }}" target="_blank">
                                                    <span class="badge bg-warning-soft mt-2">Specification
                                                        Sheet</span></a><br>
                                            @endif
                                            @if ($bid->supporting_docs)
                                                <br><a href="{{ Storage::url($bid->supporting_docs) }}"
                                                    target="_blank"><span class="badge bg-dark-soft mt-2">Supporting
                                                        Docs</span></a>
                                            @endif
                                        </td>
                                        <td>
                                            @if (now()->lte($bid->submission_date))
                                                <a href="{{ route('bidregistration', $bid->id) }}">
                                                    {{-- <a href="{{ route('bidregistration', $bid->id) }}"> --}}
                                                    <span class="badge bg-success">Register</span>
                                                </a>
                                            @else
                                                <span class="badge bg-secondary">Registration Closed</span>
                                            @endif
                                        </td>
                                        <td><a href="{{ route('viewregistrations', $bid->id) }}"><span
                                                    class="badge bg-primary">View</span></a< /td>
                                                @if (Auth::check() && Auth::user()->role === 'staff')
                                        <td><a href="/bids/edit/{{ $bid->id }}"><span
                                                    class="badge bg-info">Edit</span></a< /td>
                                @endif
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <section class="container mt-6">
        <div class="row">
            <!-- row -->
            <div class="col-md-12">
                <!-- heading -->
                <div class="border-bottom pb-3 mb-3 d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-column gap-1">
                        <h1 class="mb-0 h2 fw-bold">Past Bids</h1>
                    </div>
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
                        <table class="table table-hover text-nowrap mb-0 table-centered datatable" id="projectTable">
                            <thead class="table-light">
                                <tr>
                                    <th>Bid Description</th>
                                    <th>Iulaan Number</th>
                                    <th>Registration Deadline</th>
                                    <th>Files</th>
                                    <th>Status</th>
                                    <th>List</th>
                                    @if (Auth::check() && Auth::user()->role === 'staff')
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pastbids as $pastbid)
                                    <tr>
                                        <td><span>{{ $pastbid->description }}</span><br><span
                                                class="mvtypewriter ">{{ $pastbid->description_mv }}</span></td>
                                        <td>{{ $pastbid->iulaan_number }}</td>
                                        <td>{{ \Carbon\Carbon::parse($pastbid->submission_date)->format('d-m-Y H:i') }}
                                        </td>
                                        <td>
                                            <a href="{{ Storage::url($pastbid->iulaan_pdf) }}" target="_blank"><span
                                                    class="badge bg-primary-soft">Iulaan</span></a><br>
                                            <a href="{{ Storage::url($pastbid->info_sheet_pdf) }}"
                                                target="_blank"><span class="badge bg-info-soft mt-2">Information
                                                    Sheet</span></a>
                                            @if ($pastbid->spec_sheet_pdf)
                                                <br><a href="{{ Storage::url($pastbid->spec_sheet_pdf) }}" target="_blank">
                                                    <span class="badge bg-warning-soft mt-2">Specification
                                                        Sheet</span></a><br>
                                            @endif
                                            @if ($pastbid->supporting_docs)
                                                <br><a href="{{ Storage::url($pastbid->supporting_docs) }}"
                                                    target="_blank"><span class="badge bg-dark-soft mt-2">Supporting
                                                        Docs</span></a>
                                            @endif
                                        </td>
                                        <td><span class="badge bg-primary">{{ $pastbid->status }}</span></td>
                                        <td><a href="{{ route('viewregistrations', $pastbid->id) }}"><span
                                                    class="badge bg-primary">View</span></a< /td>
                                                @if (Auth::check() && Auth::user()->role === 'staff')
                                        <td><a href="/bids/edit/{{ $pastbid->id }}"><span
                                                    class="badge bg-info">Edit</span></a< /td>
                                @endif
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>





</div>
