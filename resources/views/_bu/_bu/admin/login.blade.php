@extends('admin.master')

@section('content')
<form method="POST" action="{{ URL::route('login') }}">
    {!! csrf_field() !!}
    <input type="hidden" name="user-type" value="admin">
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
    </div>

    <div class="form-row">
        <input type="submit" value="Login">
    </div>
</form>


@endsection