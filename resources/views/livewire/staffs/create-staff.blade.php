<div>
    <x-slot name="title">MBS Bid Portal - Create Staff</x-slot>
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
                        <h1 class="mb-0 h2 fw-bold">Create User</h1>
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
                        <h3 class="mb-0">Fill the user information</h3>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form wire:submit.prevent="createUser">
                            <!-- name -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" class="form-control" wire:model="name" placeholder="">
                                @error('name')<div class="invalid-feedback d-flex">{{ $message }}</div>@enderror
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" class="form-control" wire:model="email" placeholder="">
                                @error('email')<div class="invalid-feedback d-flex">{{ $message }}</div>@enderror
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" class="form-control" wire:model="password"
                                    placeholder="">
                                @error('password')<div class="invalid-feedback d-flex">{{ $message }}</div>@enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" id="password_confirmation" class="form-control"
                                    wire:model="password_confirmation" placeholder="">
                                @error('password_confirmation')<div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <!-- Button -->
                                <div class="d-block">
                                    <button type="submit" class="btn btn-primary" id="register">Create User</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
