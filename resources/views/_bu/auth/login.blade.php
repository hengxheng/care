@extends('html')

@section('content')
<form method="POST" action="{{ URL::route('login') }}">
    {!! csrf_field() !!}

    <div class="form-row">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-row">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>

    <div class="form-row">
        <input type="checkbox" name="remember"> <label for="remember">Remember Me</label>
         <a id='forgot_password' href="{{ URL::route('password.getemail')}}">Forgot password</a>
    </div>
    <div class="form-row">
        <input type="submit" value="Login">
    </div>
</form>

@endsection