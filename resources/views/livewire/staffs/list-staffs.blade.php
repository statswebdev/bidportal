<div>
    <x-slot name="title">MBS Bid Portal - Staff List</x-slot>

    <section class="container mt-6">
    
      <div class="row">
        <div class="col-12">
          <!-- heading -->
          <div class="border-bottom pb-3 mb-3 d-flex align-items-center justify-content-between">
              <div class="d-flex flex-column gap-1">
                <h1 class="mb-0 h2 fw-bold">Staff List</h1>
              </div>
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
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                <td>
                                    <div class="dropdown">
                                      <a class="text-body text-primary-hover" href="#" role="button" id="dropdownThirtyOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fe fe-more-vertical"></i>
                                      </a>
                                      <div class="dropdown-menu" aria-labelledby="dropdownThirtyOne">
                                        <a class="dropdown-item" href="/staffs/edit/{{ $user->id }}">Edit</a>
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
