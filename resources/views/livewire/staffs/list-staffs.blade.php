<div>
    <x-slot name="title">MBS Bid Portal - Staff List</x-slot>

    <section class="container mt-6">

        <div class="row">
            <div class="col-12">
                @if (session()->has('created'))
                    <div class="alert alert-success d-flex align-items-center mb-5" role="alert">
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

            <div class="col-12">
                <!-- heading -->
                <div class="border-bottom pb-3 mb-3 d-flex align-items-center justify-content-between">
                    <div class="d-flex flex-column gap-1">
                        <h1 class="mb-0 h2 fw-bold">Staff List</h1>
                    </div>
                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <div class="text-end">
                            <a href="{{ route('create-staff') }}" class="btn btn-primary">Create User</a>
                        </div>
                    @endif
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
                        <table class="table table-hover text-nowrap mb-0 table-centered datatable" id="staffTable">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="text-body text-primary-hover" href="#" role="button"
                                                    id="dropdownThirtyOne" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownThirtyOne">
                                                    <a class="dropdown-item"
                                                        href="/staffs/edit/{{ $user->id }}">Edit</a>
                                                </div>
                                            </div>
                                        </td>
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
