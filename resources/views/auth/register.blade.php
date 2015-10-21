@extends('html')

@section('content')
<form method="POST" action="{{ URL::route('register') }}">
    {!! csrf_field() !!}
    
    <div class="form-row">
        <select name="user_type">
            <option value="giver">I want to become a care giver</option>
            <option value="seeker">I want to become a care seeker</option>
        </select>
    </div>

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
@endsection