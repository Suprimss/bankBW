@extends('admin.frame') 



@section('content')        
              <div class="d-flex justify-content-between">
              <h5 class="card-title">Transaction History</h5>


              @if(Auth::user()->role == 'admin')
              <!-- Search Bar -->
              <form action="{{ route('admin.searchTransactions') }}" method="GET" class="d-flex">
                  <select id="searchBy" name="search_by" class="btn btn-primary dropdown-toggle" onchange="changeInputType()">
                      <option value="id">ID</option>
                      <option value="userId">User ID</option>
                      <option value="name">Name</option>
                      <option value="class">Class</option>
                      <option value="admin">Admin</option>
                      <option value="created_at">Date</option>
                  </select>
                  <input type="text" id="searchQuery" name="query" placeholder="Search..." class="form-control">
                  <button type="submit" class="btn btn-primary">Search</button>
              </form>
              @endif
              </div>
              <div class="table-responsive">
                <table class="table text-nowrap align-middle mb-0">
                  <thead>
                    <tr class="border-2 border-bottom border-primary border-0"> 
                      <th scope="col" class="text-center">id</th>
                      <th scope="col" class="ps-0">userId</th>
                      <th scope="col" class="ps-0">name</th>
                      <th scope="col">class</th>
                      <th scope="col">admin Pencatat</th>
                      <th scope="col">Balance</th>
                      <th scope="col" class="text-center">action</th>
                      <th scope="col">amount</th>
                      <th scope="col">New Balance</th>
                      <th scope="col">Waktu Transaksi</th>
                      <th scope="col">Print Struk</th>
    
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    
                  @foreach($Log as $transaction)
                    <tr>
                        <td class="text-center">{{ $transaction->id }}</td>
                        <td>{{ $transaction->userId }}</td>
                        <td>{{ $transaction->name }}</td>
                        <td>{{ $transaction->class }}</td>
                        <td>{{ $transaction->admin }}</td>
                        <td>{{ $transaction->oldBalance }}</td>
                        <td>{{ $transaction->action }}</td>
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->NewBalance }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>
                          <a href="{{ Route('admin.recipt',$transaction->id) }}" class="btn btn-primary">Print</a>
                        </td>
                        
                        
                        
                      </tr>
                  @endforeach
                  
                  </tbody>
                 
                </table>
                
              </div>
              <div class="d-flex flex-column">
            
              </div>

              <script>
                function changeInputType() {
                    var searchBy = document.getElementById('searchBy').value;
                    var searchQuery = document.getElementById('searchQuery');

                    if (searchBy === 'created_at') {
                        searchQuery.type = 'date';
                    } else {
                        searchQuery.type = 'text';
                    }
                }
            </script>
@endsection

