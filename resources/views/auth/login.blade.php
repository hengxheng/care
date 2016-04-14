@extends('html')

@section('content')


<div class="login-block" style="padding-left:0;">
    <h1 style="margin-bottom:40px;">Login to CareNation</h1>
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
    <p id="join-link">Not a member? Click here to <a href="{{ URL::route('register') }}" style="font-size: 14px;">Join Now</a>.</p>
</div>

<aside id="sidebar">
    <div class="sidebar-block">
        <h4>Find Care For Your Family</h4>
        <p>Get started by posting your care needs today and see who can hep.</p>
        <a class="cta push" href="/careseeker_signup">I'm Looking for care</a>

        <h4>Apply for Caregiver Jobs</h4>
        <p>Connect with those seeking care today and see how you can help people in need.</p>
        <a class="cta" href="https://app.carenation.com.au/giver/register">I want to provide care</a>
    </div>

    <div class="sidebar-block contact">
        <h4>Contact CareNation</h4>
        <ul>
            <!-- <li><a href="tel:02052692359"><i class="fa fa-phone"></i>020 5269 2359</a></li> -->
            <li><a href="mailto:info@carenation.com.au"><i class="fa fa-envelope"></i>info@carenation.com</a></li>
        </ul>

    </div>
</aside>
<style>
.page-main{
    min-height: 500px !important;
}
</style>
@endsection