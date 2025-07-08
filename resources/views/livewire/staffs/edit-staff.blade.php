<div>
    <x-slot name="title">MBS Bid Portal - Edit Staff Information</x-slot>

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
                        <div>{{session('updated')}}</div>
                    </div>
                    @endif
                </div>
                <!-- row -->
                <div class="col-12">
                    <div class="border-bottom pb-3 mb-3 d-flex align-items-center justify-content-between">
                        <div class="d-flex flex-column gap-1">
                          <h1 class="mb-0 h2 fw-bold">Edit User</h1>
                          <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="{{ route('list-staff') }}">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Edit Staff {{ $user->name }}</li>
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
                            <h3 class="mb-0">Update user information</h3>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                            <!-- Form -->
                            <form wire:submit.prevent="updateUser" class="row">
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="fname">Name</label>
                                    <input type="text" id="fname" class="form-control" placeholder="Name" wire:model="name">
                                    @error('name')<div class="invalid-feedback d-flex">{{ $message }}</div>@enderror
                                </div>
                                <div class="mb-3 col-12 col-md-6">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" id="email" class="form-control" placeholder="Email" wire:model="email">
                                    @error('email')<div class="invalid-feedback d-flex">{{ $message }}</div>@enderror
                                </div>
                                <div class="mb-3 col-12 col-md-12">
                                    <label class="form-label" for="role">Select Role</label>
                                        <select class="form-select" aria-label="role" wire:model="role">
                                          <option value="staff">Staff</option>
                                          <option value="admin">Admin</option>
                                        </select>
                                    @error('role')<div class="invalid-feedback d-flex">{{ $message }}</div>@enderror
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
