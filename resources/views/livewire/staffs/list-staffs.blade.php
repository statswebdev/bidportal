<div>
    <section class="pt-6">
        <div class="container px-4 px-lg-0"> 
            <div class="row">
                <!-- row -->
                <div class="col-md-6 ">
                <!-- heading -->
                <h1 class="display-4 fw-bold">Staff Information</h1>
                </div>
            </div>    
        </div>
    </section>

    <section class="pt-6">
        <div class="container px-4 px-lg-0">
            <div class="row">
                <div class="card">
                    <div class="p-4 row g-3">
                        <!-- Form -->
                        <div class="col-12 col-lg-6">
                            <!-- search -->
                            <form class="d-flex align-items-center">
                                <span class="position-absolute ps-3 search-icon">
                                    <i class="fe fe-search"></i>
                                </span>
                                <!-- input -->
                                <input type="search" class="form-control ps-6" id="searchInput" placeholder="Search for order ID, customer name, order status ...">
                            </form>
                        </div>
                    </div>
                    <!-- table  -->
                    <div class="table-responsive pb-5">
                      <table class="table table-hover text-nowrap mb-0 table-centered" id="projectTable">
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
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="#">Delete</a>
                                      </div>
                                    </div>
                                  </td>
                            </tr>
                            @endforeach
                          <tr id="noRecordsRow" style="display: none;">
                            <td colspan="5" class="text-center">No records found</td>
                        </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
            </div>
        </div>
    </section> 
    <script>
        // Search filtering function
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('#projectTable tbody tr');
            let visibleRows = 0;
    
            tableRows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                if (rowText.includes(searchValue)) {
                    row.style.display = '';
                    visibleRows++;
                } else {
                    row.style.display = 'none';
                }
            });
    
            // Show "No records found" if no rows are visible
            document.getElementById('noRecordsRow').style.display = visibleRows ? 'none' : '';
        });
    </script>
</div>
