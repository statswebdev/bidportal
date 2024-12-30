<div>
    <nav class="navbar navbar-expand-lg">
        <div class="container px-0">
            <a class="navbar-brand" href="{{route('dashboard')}}"><img src="{{asset('images/mbslogo2023.svg')}}" alt="MBS" width="300px"></a>
            <!-- Mobile view nav wrap -->
            <div class="ms-auto d-flex align-items-center order-lg-3">
                @if ($user)
                <div class="dropdown">
                  <li class="dropdown ms-2 d-inline-block position-static">
                    <a class="rounded-circle" href="#" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                      <div class="avatar avatar-md avatar-indicators avatar-online">
                        <img class="rounded-circle" src="https://geeksui.codescandy.com/geeks/assets/images/svg/price-icon-2.svg" alt="avatar">
                      </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end position-absolute mx-3 my-5">
                      <div class="dropdown-item">
                        <div class="d-flex">
                          
                          <div class="lh-1">
                            <h5 class="mb-1">{{ $user->name }}</h5>
                            <p class="mb-0">{{ $user->email }}</p>
                          </div>
                        </div>
                      </div>
                      <div class="dropdown-divider"></div>
                      <ul class="list-unstyled mb-0">
                        <li><a class="dropdown-item" href="/#"><i class="fe fe-user me-2"></i>Profile</a></li>
                        <li><a class="dropdown-item" href="/#"><i class="fe fe-settings me-2"></i>Settings</a></li>
                      </ul>
                      <div class="dropdown-divider"></div>
                      <ul class="list-unstyled mb-0">
                        <li><a class="dropdown-item" wire:click="logout" role="button"><i class="fe fe-power me-2"></i>Sign Out</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                </div>
                @endif
                <ul class="navbar-nav navbar-right-wrap ms-2 flex-row d-none d-md-block"></ul>
              </div>
            <!-- Navbar Toggler -->
            <div>
                <!-- Button -->
                <button class="navbar-toggler ms-2 collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-default" aria-controls="navbar-default" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar top-bar mt-0"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
            </div>
            <!-- Collapse -->
            @if ($user)
            <div class="navbar-collapse collapse" id="navbar-default" style="">
                <ul class="navbar-nav mt-3 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('dashboard')}}">Home <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bids
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('bids.create')}}">Create a Bid</a>
                        <a class="dropdown-item" href="{{route('dashboard')}}">View Bids</a>
                    </li>
                </ul>
            </div>
            @endif
        </div>
    </nav>
</div>