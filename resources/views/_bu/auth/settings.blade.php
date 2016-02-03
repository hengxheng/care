@extends('html')
@section('content')
<div class="block">
    <div class="page-title">
        <h2>Account Settings</h2>
    </div>
<form method="POST" action="{{ URL::route('account.changepass') }}">
    {!! csrf_field() !!}
    <div class="form-row">
        <label for="password">New password</label>
        <input type="password" name="password" value="">
    </div>
    <div class="form-row">
        <label for="confirm_new_password">Confirm new password</label>
        <input type="password" name="confirm_new_password" value="">
    </div>

    <div class="form-row">
        <input type="submit" value="Submit">
    </div>
</form>
</div>
@endsection