@extends('admin.frame')        



@section('content')  

@if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
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
<div class="d-flex justify-content-center">
<div class="card flex-column flex-column" style="width: 50%;">
<div class="card badge " >    
<h1 class="card-title fw-semibold">
    Form
    @if(request('action') == 1)
        Setor
    @else
        Tarik
    @endif
    Tunai
</h1>
<h5><strong>{{ $acc->name}} jurusan {{ $acc->class }}</strong> </h5>
</div>

<div class="card">
<form method="post" action="{{ route('admin.TransactionAction') }}" >
    @csrf
                <input type="hidden" name="id" value="{{ encrypt($acc->id)}}">
                <input type="hidden" name="action" value="{{ encrypt($action) }}">
                  <div id="emailHelp" class="form-text"> masukan Jumlah Yang ingin di    
                        @if(request('action') == 1)
                            Setor
                        @else
                            Tarik
                        @endif
                    </div>
                <div class="mb-1">  
                    <div class="d-flex flex-column">
                        <div class="d-flex flex-wrap">   
                            <input type="radio" class="btn-check" id="2000" name="amount" onclick="writeCustomAmount(2000)" value="2000" {{ old('Amount') == '2000' ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary m-1" for="2000">2000
                            </label>
                            <input type="radio" class="btn-check" id="5000" name="amount" onclick="writeCustomAmount(5000)" value="5000" {{ old('Amount') == '5000' ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary m-1" for="5000">
                            5000
                            </label>
                            <input type="radio" class="btn-check" id="10000" name="amount" onclick="writeCustomAmount(10000)" value="10000" {{ old('Amount') == '10000' ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary m-1" for="10000">
                            10000
                            </label>
                            <input type="radio" class="btn-check" id="20000" name="amount" onclick="writeCustomAmount(20000)" value="20000" {{ old('Amount') == '20000' ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary m-1" for="20000">
                            20000
                            </label>
                            <input type="radio" class="btn-check" id="50000" name="amount" onclick="writeCustomAmount(50000)" value="50000" {{ old('Amount') == '50000' ? 'checked' : '' }}>
                            <label class="btn btn-outline-primary m-1" for="50000">
                            50000
                            </label>
                            <label for="Amount" class="form-label">Custom</label>
                            <input value="{{ old('amount') }}" type="number" class="form-control" id="Amount" aria-describedby="amount" name="amount" oninput="document.querySelectorAll('[name=amount]').forEach(rb => rb.checked = false)">
                        </div>
                            @error('amount')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>
                   
                   
                  </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    @if(request('action') == 1)
                    Setor
                    @else
                    Tarik
                    @endif
                    </button>

                  <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                  @include('admin.transactionConfirm')
</form>
</div>
</div>
</div>
<script>
        function writeCustomAmount(value) {
            document.getElementById("Amount").value = value;
        }
</script>

@endsection



