@extends('admin.frame')



@section('content')
<div class="d-flex justify-content-between">

    <div class="card">
        
        <h1>hi {{ Auth::user()->name }}</h1>
        <h1>ur balance is </h1>
    </div>
    <div class="unlimited-access hide-menu bg-primary-subtle position-relative  rounded-3" style="width: 50%;">
    
    <h1>balance</h1>
    <h1>Rp. {{Auth::user()->balance}}</h1>
    </div>
</div>
        
@endsection
