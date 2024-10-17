
@extends('admin.frame') 


@section('content')    


              <div class="d-flex justify-content-between">
              <h5 class="card-title">Account info</h5>
              </div>
              <div class="table-responsive">
                <table class="table text-nowrap align-middle mb-0">
                  <thead>
                    <tr class="border-2 border-bottom border-primary border-0"> 
                      <th scope="col" class="text-center">id</th>
                      <th scope="col" class="ps-0">name</th>
                      <th scope="col" class="ps-0">email</th>
                      <th scope="col">class</th>
                      <th scope="col" class="text-center">balance</th>
                      <th scope="col" class="text-center">transactions</th>
                    </tr>
                  </thead>
                  <tbody class="table-group-divider">
                    
                  @foreach($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->class }}</td>
                        <td class="text-center">{{ $user->balance }}</td>
                        <td class="d-flex justify-content-center  ">
                          <a href="{{ route('admin.storeTransactions',['id' => Hashids::encode($user->id), 'action' => '1']) }}" class="btn btn-success ">Setor</a>
                          <a href="{{ route('admin.storeTransactions',['id' => Hashids::encode($user->id), 'action' => '2']) }}" class="btn btn-success ">tarik</a>
                        </td>
                        
                        
                      </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
@endsection

