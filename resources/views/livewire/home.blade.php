<div>
    
    @guest
        <livewire:inc.navbar />
    @endguest

    <section class="py-5 border-bottom" style="background-image: url(https://geeksui.codescandy.com/geeks/assets/images/mentor/mentor-glow.svg); background-repeat: no-repeat; background-size:cover;">
        <div class="container py-8">
          <!--row-->
          <div class="row align-items-center justify-content-center">
            <div class="col-12 mt-0">
              <div class="d-flex flex-column text-center">
                <div class="d-flex flex-column gap-2">
                  <!--heading-->
                  <h1 class="mb-0 display-2 fw-bold">
                    <div>MBS Bid Portal</div>
                  </h1>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>


    <livewire:bids.list-bids />

    <x-slot name="title">MBS Bid Portal</x-slot>
</div>
