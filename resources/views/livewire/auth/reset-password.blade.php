<div>
    <x-slot name="title">MBS Bid Portal - Reset Password</x-slot>

    <section class="container d-flex flex-column vh-100">
        <div class="row align-items-center justify-content-center g-0 h-lg-100 py-8">
            <div class="col-lg-5 col-md-8 py-8 py-xl-0">

                @if (session()->has('message'))
                <div class="text-green-600">{{ session('message') }}</div>
                @endif

                <!-- Card -->
                <div class="card shadow">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <a href="#"><img src="https://statisticsmaldives.gov.mv/mbs/wp-content/themes/neon/images/mbslogo2023.svg" class="mb-4 px-6 border-bottom pb-5" alt="logo-icon"></a>
                        <div class="mb-4">
                            <h1 class="mb-1 fw-bold">Reset Password</h1>
                            <p>Change your password</p>
                        </div>
                        <!-- Form -->

                        <form wire:submit.prevent="resetPassword" class="mt-6 space-y-4">
                            <!-- Include the token -->
                            <input type="hidden" wire:model="token">

                            <!-- Email Input -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" type="email" wire:model.lazy="email" class="form-control" disabled>
                                @error('email')<div class="invalid-feedback d-flex">{{ $message }}</div>@enderror
                            </div>

                            <!-- New Password Input -->
                            <div class="mb-3">
                                <label for="password" class="form-label">New Password</label>
                                <input id="password" type="password" wire:model.lazy="password" class="form-control">
                                @error('password')<div class="invalid-feedback d-flex">{{ $message }}</div>@enderror
                            </div>

                            <!-- Confirm Password Input -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input id="password_confirmation" type="password"
                                    wire:model.lazy="password_confirmation" class="form-control">
                                @error('password_confirmation')<div class="invalid-feedback d-flex">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit" class="btn btn-primary">Reset Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>