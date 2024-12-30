<div>
    <section class="container d-flex flex-column vh-100">


        <div class="row align-items-center justify-content-center g-0 h-lg-100">
            <div class="col-lg-5 col-md-8 py-6">
                @if (session()->has('error'))
                <div class="alert alert-danger d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16">
                        <path
                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <div>{{session('error')}}</div>
                </div>
                @endif
                <!-- Card -->
                <div class="card shadow">
                    <!-- Card body -->
                    <div class="card-body p-6">
                        <a href="#"><img src="https://statisticsmaldives.gov.mv/mbs/wp-content/themes/neon/images/mbslogo2023.svg" class="mb-4 px-6 border-bottom pb-5" alt="logo-icon"></a>
                        <div class="mb-4">
                            <h1 class="mb-1 fw-bold text-center">Bid Portal</h1>
                            <h1 class="mb-1 fw-bold">Sign up</h1>
                            <span>
                                Already have an account?
                                <a href="{{route('login')}}" class="ms-1">Sign in</a>
                            </span>
                        </div>
                        <!-- Form -->
                        <form wire:submit.prevent="register">
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
                            <!-- Checkbox -->
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="agreeCheck" required>
                                    <label class="form-check-label" for="agreeCheck">
                                        <span>
                                            I agree to the
                                            <a href="/#">Terms of Service</a>
                                            and
                                            <a href="/#">Privacy Policy.</a>
                                        </span>
                                    </label>
                                    <div class="invalid-feedback">You must agree before submitting.</div>
                                </div>
                            </div>
                            <div>
                                <!-- Button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary" id="register">Create Account</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>