@extends('html')

@section('content')

<div class="welcome title">
    <h1>Welcome to CareNation</h1>
</div>

<div class="login-block" style="padding-left:0;">
    <h1>Login to CareNation</h1>
<form method="POST" action="{{ URL::route('login') }}">
    {!! csrf_field() !!}

    <div class="form-row first">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-row second">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>

    <div class="form-row">
        <input type="checkbox" name="remember"> <label for="remember">Remember Me</label>
         <a id='forgot_password' href="{{ URL::route('password.getemail')}}">Forgot password</a>
    </div>
    <div class="form-row submit">
        <input type="submit" value="Login">
    </div>

</form>
    <p id="join-link">Not a member? Click here to <a href="{{ URL::route('register') }}">Join Now</a>.</p>
</div>

@endsection