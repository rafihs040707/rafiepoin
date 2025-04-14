@extends('auth.layouts')

@section('content')

<form action="{{ route('authenticate') }}" method="post">
      <h1>Login</h1><br>
      @csrf
      <label>Email Address</label><br>
      <input type="email" id="email" name="email" value="{{ old('email') }}"><br><br>
      <label>Password</label><br>
      <input type="password" id="password" name="password"><br><br>
      <input type="submit" value="Login">
</form>

@endsection