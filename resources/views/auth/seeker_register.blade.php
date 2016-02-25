@extends('html')

@section('pageType', 'seeker-signup')
@endsection

@section('content')

<div id="user-2" class="register-block">
<form method="POST" action="{{ URL::route('register') }}">
    {!! csrf_field() !!}
    <h2>I'm looking for care</h2>
    <input type="hidden" name="user_type" value="seeker">

    <div class="form-row">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" value="{{ old('firstname') }}">
    </div>

    <div class="form-row">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" value="{{ old('lastname') }}">
    </div>

    <div class="form-row">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>
    
    <div class="form-row">
        <label for="phone">Phone</label>
        <input type="text" name="phone" value="{{ old('phone') }}">
    </div>
  
    <div class="form-row">
        <label for="password">Password</label>
        <input type="password" name="password">
    </div>

    <div class="form-row">
        <label for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation">
    </div>

    <div class="form-row">
        <input type="submit" value="Register">
    </div>
</form>
</div>
@endsection