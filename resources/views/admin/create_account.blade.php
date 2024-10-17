@extends('admin.frame')        
        
@section('content')  

<h5 class="card-title fw-semibold mb-4">create account</h5>
<div class="card m-1">
<form method="post" action="{{ route('admin.storeAcc') }}" >
    @csrf
                  <div class="mb-1">
                    <label for="exampleInputEmail1" class="form-label">user Name</label>
                    <input value="{{ old('name') }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="name" name="name">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input value="{{ old('email') }}" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="email" name="email">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  
                    <label class="form-label">role</label>
                      <div class="mb-3 d-flex flex-row">  
                        <input type="radio" class="btn-check" id="option1" name="role" class="btn-check" value="admin" {{ old('role') == 'admin' ? 'checked' : '' }}>
                        <label class="btn btn-outline-warning m-1" for="option1">admin</label>                       
                        
                        <input type="radio" class="btn-check" id="option2" name="role"  value="user" {{ old('role') == 'user' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary m-1" for="option2">user</label>
                        
                        @error('role')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <label class="form-label">class</label>
                  <div class="mb-3 d-flex flex-column">
                      <div class="d-flex flex-row">   
                        <input type="radio" class="btn-check" id="tkj" name="class" value="tkj" {{ old('class') == 'tkj' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary m-1" for="tkj">tkj
                        </label>
                        <input type="radio" class="btn-check" id="mm" name="class" value="mm" {{ old('class') == 'mm' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary m-1" for="mm">
                        mm
                        </label>
                        <input type="radio" class="btn-check" id="otkp" name="class" value="otkp" {{ old('class') == 'otkp' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary m-1" for="otkp">
                        otkp
                        </label>
                        <input type="radio" class="btn-check" id="akl" name="class" value="akl" {{ old('class') == 'akl' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary m-1" for="akl">
                        akl
                        </label>
                        <input type="radio" class="btn-check" id="other" name="class" value="other" {{ old('class') == 'other' ? 'checked' : '' }}>
                        <label class="btn btn-outline-primary m-1" for="other">
                        other
                        </label>
                      </div>
                        @error('class')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input value="{{ old('password') }}" type="password" class="form-control" id="exampleInputPassword1" name="password">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection