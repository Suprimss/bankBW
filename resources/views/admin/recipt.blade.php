@extends('admin.frame')        
        
@section('content')  
<div >
<div class="d-flex bd-highlight">
<H1 class="me-auto">@if(request('action') == 1)
        Setor
        @else
            Tarik
        @endif Tunai:</H1>
        <h5 >Transaction id: </h5>
    <H5>{{ $transaction->id }}</H5>
</div>
<hr style="text-align:left;margin-left:0">
<div class="d-flex justify-content-between">
    <h5>Waktu</h5>
    <H5>{{ $transaction->created_at }}</H5>
</div>
<div class="d-flex justify-content-between">
    <h5>Account</h5>
    <H5>{{ $transaction->name }}</H5>
</div>
<div class="d-flex justify-content-between">
    <h5>saldo Sebelum</h5>
    <H5>Rp. {{ $transaction->oldBalance }}</H5>
</div>
<div class="d-flex justify-content-between">
    <h5>Nominal Transaksi</h5>
    <H5>Rp. {{ $transaction->amount }}<hr style="margin: 0;"></H5>
    
</div>
<div class="d-flex justify-content-between">
    <h5>Saldo Akhir</h5>
    <H5>Rp. {{ $transaction->NewBalance }}</H5>
</div>
<hr style="text-align:left;margin-left:0">
<div>
   <H6> Transaksi ini tercata oleh admin : {{ $transaction->admin }} Pada tanggal {{ $transaction->created_at }} </H6>
</div>
</div>
<hr style="text-align:left;margin-left:0">
@if(Auth::user()->role == 'admin')
<a href="{{ route('admin.HistoryTransactions') }}" class="btn btn-success ">Back</a>
@else
<a href="{{ route('history') }}" class="btn btn-success ">Back</a>
@endif
<button onclick="window.print()" class="btn btn-success ">Print</button>

@endsection


