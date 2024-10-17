@extends('user.frame')



@section('content')


<h1>hi {{ Auth::user()->name }}</h1>
<h1>ur balance is </h1>


@endsection
