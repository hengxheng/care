@extends('html')
@section('pageType', 'home-page')
@endsection

@section('content')

<div class="welcome title">
    <h1>Welcome to CareNation</h1>
</div>

<div class="login-block">
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
    <div class="form-row">
        <input type="submit" value="Login">
    </div>
</form>
</div>

<div class="register-block-container">
    <div class="register-block">
    <h1>Find Care For Your Family</h1>
    <p>Get started by posting your care needs today and see who can hep.</p>
    <a href="{{ URL::route('seeker_register') }}" class="blue-btn">I'm looking for care</a>
</div>

<div class="register-block">
    <h1>Apply for Caregiver Jobs</h1>
    <p>Connect with those seeking care today and see how you can help people in need.</p>
    <a href="{{ URL::route('giver_register') }}" class="blue-btn">I want to provide care</a>
</div>
</div>

<div class="testimonial-block">
    <h1>What our users think</h1>
    <div class="single-testimonail">
        <div class="testimonial-featured">
            <img src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/128.jpg" style="border-radius: 64px;" />
        </div>

        <div class="testimonial-content">
            <h3>J. Casey</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec interdum leo id tempor mollis. Nam elit tellus, finibus sit amet aliquam ut, venenatis at diam. Fusce ut dui vel lacus pulvinar auctor non ut mauris. Maecenas sit amet turpis eget eros luctus semper. Maecenas tempor odio id massa aliquam, id hendrerit nisl convallis.</p>
        </div>
    </div>
</div>

@endsection