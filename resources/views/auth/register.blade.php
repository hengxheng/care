@extends('html')
@section('pageType', 'home-page')
@endsection

@section('content')

<div class="welcome title">
    <h1>Welcome to CareNation</h1>
</div>

<div class="register-block-container">
    <div class="register-block">
        <h1>Find Care For Your Family</h1>
        <p>Get started by posting your care needs today and see who can hep.<br/>&nbsp;</p>
        <!-- <a href="{{ URL::route('seeker_register') }}" class="blue-btn">I'm looking for care</a> -->
        <a href="http://www.carenation.com.au/careseeker_signup/" class="blue-btn">I'm looking for care</a>
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
            <img src="{{ URL::asset('images/fiverr.jpg') }}" style="border-radius: 50%;width: 128px; height: 128px;" />
        </div>

        <div class="testimonial-content">
            <h3>Nancy</h3>
            <p>I am loving CareNation, it is a very easy website to navigate and to get the help we need for our Mother. Neither my sister or I live close enough to Mum to be there to help her daily so we needed to find someone to be there for Mum. CareNation can provide just that! </p>
        </div>
    </div>
</div>

@endsection