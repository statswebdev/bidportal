<div>
    <x-slot name="title">MBS Bid Portal - Edit Settings</x-slot>

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
        </div>
    </section>

    <section class="pt-5 pb-5">
        <div class="container">
            <!-- User info -->
            <div class="row">
                @if (Auth::user())
                    <livewire:inc.sidebar />
                @endif

                <div class="col-lg-9 col-md-8 col-12">
                    <!-- Card -->
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Settings Details</h3>
                            <p class="mb-0">You have full control to manage your own account setting.</p>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div>
                                <h4 class="mb-0">Security Details</h4>
                                <p class="mb-4">Update Password</p>
                                <!-- Form -->
                                <form wire:submit.prevent="updateSettings" class="row gx-3">
                                    <!-- Last name -->
                                    <div class="mb-2 col-12 col-md-6">
                                        <label class="form-label" for="profileEmail">Email Address</label>
                                        <input type="text" id="profileEmail" name="profileEmail" class="form-control"
                                            wire:model.defer="email" disabled>
                                        @error('email')
                                            <div class="invalid-feedback d-flex">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>

                                        <hr>

                                        <div class="col-lg-6 col-md-12 col-12">
                                            <!-- Current password -->
                                            <div class="mb-3">
                                                <label class="form-label" for="securityCurrentPass">Current
                                                    password</label>
                                                <input id="securityCurrentPass" type="password"
                                                    name="securityCurrentPass" class="form-control"
                                                    wire:model.defer="password">
                                                @error('password')
                                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <!-- New password -->
                                            <div class="mb-3 password-field">
                                                <label class="form-label" for="securityNewPass">New password</label>
                                                <input id="securityNewPass" type="password" name="securityNewPass"
                                                    class="form-control mb-2" wire:model.defer="newpassword">
                                                @error('newpassword')
                                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                                @enderror
                                                <div class="row align-items-center g-0">
                                                    <div class="col-6">
                                                        <span data-bs-toggle="tooltip" data-placement="right"
                                                            data-bs-original-title="Password is required and must be at least 6 characters long.">
                                                            Password strength
                                                            <i class="fe fe-help-circle ms-1"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3 mt-3">
                                                <!-- Confirm new password -->
                                                <label class="form-label" for="securityConfirmPass">Confirm New
                                                    Password</label>
                                                <input id="securityConfirmPass" type="password"
                                                    name="securityConfirmPass" class="form-control mb-2"
                                                    wire:model="newpassword_confirmation">
                                                @error('newpassword_confirmation')
                                                    <div class="invalid-feedback d-flex">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <!-- Button -->
                                        <button class="btn btn-primary" type="submit">Update Settings</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
