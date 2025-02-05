@extends('auth.layouts')

@section('content')
<br><br>
<form action="{{ route('authenticate') }}" method="post">
<div class="group block max-w-max mx-auto rounded-lg p-6 bg-white ring-1 ring-slate-900/5 shadow-lg grid justify-center">
      <h1 class="text-xl text-center font-sans font-medium">Login</h1><br>
      @csrf
      <label>Email Address</label>
      <input type="email" id="email" name="email" value="{{ old('email') }}" class="border border-slate-400 rounded bg-white hover:bg-sky-50 py-1"><br>
      
      <label>Password</label>
      <input type="password" id="password" name="password" class="border border-slate-400 rounded bg-white hover:bg-sky-50 py-1 px-3"><br>
      
      <input type="submit" value="Login" class="bg-gray-950 hover:bg-gray-400 border text-white border-slate-400 rounded">

</div>
</form>

@endsection