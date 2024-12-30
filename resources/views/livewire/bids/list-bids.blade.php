<div>

    <section class="pt-6">
        <div class="container px-4 px-lg-0"> 
            <div class="row">
                @if (session()->has('updated'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                            </path>
                        </svg>
                        <div>{{session('updated')}}</div>
                    </div>
                    @endif
                <!-- row -->
                <div class="col-md-6">
                    <!-- heading -->
                    <h1 class="display-4 fw-bold">Bids</h1>
                </div>
                @if (Auth::user()->role === 'staff')
                <div class="col-md-6">   
                    <div class="text-end">
                      <a href="{{route('bids.create')}}" class="btn btn-primary">Create Bid</a>
                    </div>
                </div>
                @endif
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
                            <th>Bid Description</th>
                            <th>Iulaan Number</th>
                            <th>Submission Date</th>
                            <th>Iulaan</th>
                            <th>Info Sheet</th>
                            <th>Status</th>
                            <th>List</th>
                            @if (Auth::user()->role === 'staff')<th>Action</th>@endif
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($bids as $bid)
                            <tr>
                                <td>{{ $bid->description }}</td>
                                <td>{{ $bid->iulaan_number }}</td>
                                <td>{{ $bid->submission_date }}</td>
                                <td><a href="{{ Storage::url($bid->iulaan_pdf) }}" target="_blank"><span class="badge bg-primary-soft">PDF</span></a></td>
                                <td><a href="{{ Storage::url($bid->info_sheet_pdf) }}" target="_blank"><span class="badge bg-primary-soft">PDF</span></a></td>
                                <td>
                                    @if(now()->lte($bid->submission_date))
                                        <a href="/#">
                                        {{-- <a href="{{ route('bidregistration', $bid->id) }}"> --}}
                                            <span class="badge bg-success">Register</span>
                                        </a>
                                    @else
                                        <span class="badge bg-secondary">Registration Closed</span>
                                    @endif
                                </td>
                                <td><a href="/viewregistration/{{ $bid->id }}"><span class="badge bg-primary">View</span></a</td>
                                    @if (Auth::user()->role === 'staff')<td><a href="/bids/edit/{{ $bid->id }}"><span class="badge bg-info">Edit</span></a</td>@endif      
                            </tr>
                            @endforeach
                          <tr id="noRecordsRow" style="display: none;">
                            <td colspan="{{ Auth::user()->role === 'staff' ? 8 : 7 }}" class="text-center">No records found</td>
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
