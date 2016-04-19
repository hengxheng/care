@extends('html')

@section('pageType', 'giver-signup')
@endsection

@section('content')
<div class="giver-register-content">
<div class="giver-register-prompt">
    <ul>
        <li><i class="fa fa-check" aria-hidden="true"></i>Carers sign up for free</li>
        <li><i class="fa fa-check" aria-hidden="true"></i>Negotiate your own rates</li>
        <li><i class="fa fa-check" aria-hidden="true"></i>View and apply to unlimited job postings</li>
        <li><i class="fa fa-check" aria-hidden="true"></i>Increase your client base</li>
        <li><i class="fa fa-check" aria-hidden="true"></i>Apply for jobs that suit your availability</li>
    </ul>
    </div>
<div id="user-1" class="register-block">
    
    
<form method="POST" action="{{ URL::route('register') }}">
    {!! Form::token() !!}

    <h2>I want to provide care</h2>
    <input type="hidden" name="user_type" value="giver">
    <div class="form-row">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" value="">
    </div>

    <div class="form-row">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" value="">
    </div>

    <div class="form-row">
        <label for="email">Email</label>
        <input type="email" name="email" value="">
    </div>
    
    <div class="form-row">
        <label for="phone">Phone</label>
        <input type="text" name="phone" value="">
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
</div>
@endsection