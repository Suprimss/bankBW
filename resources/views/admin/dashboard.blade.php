@extends('admin.frame')

@section('content')
<h3>Selamat Datang</h3>
<h3>kamu login sebagai admin</h3><h1><strong>{{ Auth::user()->name }}</strong></h1>

@endsection