<div>
    <x-slot name="title">MBS Bid Portal - Edit Profile</x-slot>

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
                            <h3 class="mb-0">Profile Details</h3>
                            <p class="mb-0">You have full control to manage your own account setting.</p>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <div>
                                <div class="mb-4 col-12 col-md-6">
                                    <div class="d-lg-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center mb-4 mb-lg-0">
                                            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/avatar.jpg') }}"
                                                id="img-uploaded" class="avatar-xl rounded-circle " alt="">
                                            <div class="ms-3">
                                                <h4 class="mb-0">Your avatar</h4>
                                                <p class=" mb-0">PNG or JPG no bigger than 40px wide and tall.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <h4 class="mb-0">Personal Details</h4>
                                <p class="mb-4">Edit your email address.</p>

                                <!-- Form -->
                                <form wire:submit.prevent="updateProfile" class="row gx-3">
                                    <!-- First name -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="profileName">Full Name</label>
                                        <input type="text" id="profileName" name="profileName" class="form-control"
                                            wire:model="name">
                                        @error('name')
                                            <div class="invalid-feedback d-flex">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Last name -->
                                    <div class="mb-3 col-12 col-md-6">
                                        <label class="form-label" for="profileEmail">Email Address</label>
                                        <input type="text" id="profileEmail" name="profileEmail" class="form-control"
                                            wire:model.defer="email" disabled>
                                        @error('email')
                                            <div class="invalid-feedback d-flex">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="profileImage">Avatar</label>
                                        <div class="input-group mb-1">
                                            <input type="file" class="form-control" id="profileImage"
                                                wire:model="avatar">
                                            @error('avatar')
                                                <div class="invalid-feedback d-flex">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <!-- Button -->
                                        <button class="btn btn-primary" type="submit" wire:loading.attr="disabled"
                                            wire:target="avatar">
                                            Update Profile
                                        </button>
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
