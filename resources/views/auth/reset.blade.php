@extends('html')

@section('content')
<form method="POST" action="{{ URL::route('password.postreset') }}">
    {!! csrf_field() !!}
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="form-row">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
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
        <input type="submit" value="Reset Password">
    </div>
</form>

@endsection