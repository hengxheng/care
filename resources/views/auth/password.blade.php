@extends('html')

@section('content')
<div class="page-title">
	Password Reset
</div>
<form method="POST" action="{{ URL::route('passwrod.postmail') }}">
    {!! csrf_field() !!}
    
    <div class="form-row">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-row">
        <input type="submit" value="Send Password Reset Link">
    </div>
</form>
<style>
.page-main{
    min-height: 500px !important;
}
</style>
@endsection