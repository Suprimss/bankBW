@extends('admin.frame') 



@section('content')    

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }, 5000); 
        </script>
    @endif    
              <div class="d-flex justify-content-between">
              <h5 class="card-title">Account info</h5>
              <a class="btn btn-primary mb-2"  href="{{ route('admin.createAcc') }}" >create account</a>
              </div>
              <div class="table-responsive">
                <table class="table text-nowrap align-middle mb-0">
                  <thead>
                    <tr class="border-2 border-bottom border-primary border-0"> 
                      <th scope="col" class="text-center">id</th>
                      <th scope="col" class="ps-0">name</th>
                      <th scope="col" class="ps-0">email</th>
                      <th scope="col">role</th>
                      <th scope="col">class</th>
                      <th scope="col" class="text-center">action</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    
                  @foreach($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->class }}</td>
                        <td class="d-flex justify-content-center  ">
                          <a href="{{ route('admin.editAcc',Hashids::encode($user->id)) }}" class="btn btn-success ">Edit</a>
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                            Dellete
                          </button>
                        </td>
                        
                        
                      </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              @include('admin.confirm')
@endsection

