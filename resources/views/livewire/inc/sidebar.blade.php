<div class="col-lg-3 col-md-4 col-12">
    <!-- Side navbar -->
    <nav class="navbar navbar-expand-md shadow-sm mb-4 mb-lg-0 sidenav">
        <!-- Menu -->
        <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
        <!-- Button -->
        <button class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light" type="button"
            data-bs-toggle="collapse" data-bs-target="#sidenav" aria-controls="sidenav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="fe fe-chevron-down"></span>
        </button>
        <!-- Collapse navbar -->
        <div class="collapse navbar-collapse" id="sidenav">
            <div class="navbar-nav flex-column">
                <span class="navbar-header">Account Settings</span>
                <!-- List -->
                <ul class="list-unstyled ms-n2 mb-0">
                    <!-- Nav item -->
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('profile') }}">
                            <i class="fe fe-settings nav-icon"></i>
                            Edit Profile
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('settings') }}">
                            <i class="fe fe-user nav-icon"></i>
                            Security
                        </a>
                    </li>
                    <!-- Nav item -->
                    <li class="nav-item">
                        <a class="nav-link" wire:click="logout" role="button">
                            <i class="fe fe-power nav-icon"></i>
                            Sign Out
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
