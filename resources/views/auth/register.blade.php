@extends('auth.layouts')

@section('content')
<br><br>
<form action="{{ route('store') }}" method="POST">
<div class="group max-w-max mx-auto rounded-lg p-6 bg-white ring-1 ring-slate-900/5 shadow-lg grid justify-items-center">
      <h1 class="text-xl text-center font-sans font-medium">Register</h1><br>
      @csrf
      <label>Nama Lengkap</label>
      <input type="text" id="name" name="name" value="{{ old('name') }}" class="border border-slate-400 rounded bg-white hover:bg-sky-50 py-1"><br>
      
      @if ($errors->has('name'))
      <span class="text-danger">{{ $errors->first("name") }}</span>
      @endif

      
      <label>Email Address</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" class="border border-slate-400 rounded bg-white hover:bg-sky-50 py-1"><br>

      @if ($errors->has('email'))
      <span class="text-danger">{{ $errors->first("email") }}</span>
      @endif

      
      <label>Password</label>
      <input type="password" id="password" name="password" class="border border-slate-400 rounded bg-white hover:bg-sky-50 py-1"><br>

      @if ($errors->has('password'))
      <span class="text-danger">{{ $errors->first("password") }}</span>
      @endif

      
      <label for="password_confirmation" class="col-md-4 col-form-label text-md-end text-start">Confirm Password</label>
      <div class="col-md-6">
            <input type="password" class="form-control border border-slate-400 rounded bg-white hover:bg-sky-50 py-1" id="password_confirmation" name="password_confirmation">
      </div> <br>
      <input type="submit" value="Register" class=" bg-gray-950 hover:bg-gray-400 border text-white border-slate-400 rounded px-3 hover:px-2">

      <div class="flex justify-center py-2">
      <p>Apabila sudah punya akun!</p>
      <a href="{{ route('login') }}" class="text-blue-600 px-1">Login</a>
      </div>
</div>
</form>
@endsection