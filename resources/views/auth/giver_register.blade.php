@extends('html-full')

@section('pageType', 'giver-signup')
@endsection

@section('content')

<div class="giver-register-header">
    <div class="site-inner">
        <div class="giver-register-header-content">
            <h2>Join our network of carers<br/>and <strong>find jobs today!</strong></h2>
            <p>Create your profile now for free</p>
            <a href="#" id="g-register" class="o-btn">Sign up</a>
        </div>
    </div>
</div>

<div id="why-join">
    <div class="site-inner">
        <div class="s-title">
            <h2>Why Join</h2>
        </div>
        <div>
            <div class="col-5">
                <div class="why-block">
                    <div class="why-img">
                        <img src="{{ URL::asset('images/n1.png') }}" alt="">
                    </div>
                    <div class="why-text">
                        Carers register for free
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="why-block">
                    <div class="why-img">
                        <img src="{{ URL::asset('images/n2.png') }}" alt="">
                    </div>
                    <div class="why-text">
                        Earn more, set your own rates
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="why-block">
                    <div class="why-img">
                        <img src="{{ URL::asset('images/n3.png') }}" alt="">
                    </div>
                    <div class="why-text">
                        View and apply to unlimited job postings
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="why-block">
                    <div class="why-img">
                        <img src="{{ URL::asset('images/n4.png') }}" alt="">
                    </div>
                    <div class="why-text">
                        Increase your client base
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="why-block">
                    <div class="why-img">
                        <img src="{{ URL::asset('images/n5.png') }}" alt="">
                    </div>
                    <div class="why-text">
                        Apply for jobs that suit your availability
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="register-testimonials">
    <div class="site-inner">
        <div class="s-title">
                <h2>Testimonials</h2>
            </div>
        <div id="register-slider">
            <div id="the-slider" class="register-testimonials-block">
                <div id="g-slider1" class="block-sliders active">
                    <div class="register-testimonials-img">
                        <img src="{{ URL::asset('images/t3.jpg') }}">
                        <div class="t-name"><strong>Sue</strong></div>
                        <div class="t-type">Carer</div>
                        <div class="t-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Sydney, Australia</div>
                    </div>
                    <div class="register-testimonials-text">
                        <p>"Being a carer on CareNation has been a great experience. I am able to apply for the jobs I want so I am able to be very flexible with my hours. Not only that, but getting new clients isn’t such a daunting task anymore. Great site and I recommend it to anyone who is looking for a career as a Carer!"</p>
                    </div>
                </div>
                <div id="g-slider2" class="block-sliders">
                    <div class="register-testimonials-img">
                        <img src="https://app.carenation.com.au/images/c2.jpg">
                        <div class="t-name"><strong>Sue</strong></div>
                        <div class="t-type">Carer</div>
                        <div class="t-location"><i class="fa fa-map-marker" aria-hidden="true"></i> Sydney, Australia</div>
                    </div>
                    <div class="register-testimonials-text">
                        <p>"As a carer on CareNation, I love this site. I can set my own rates and only worry about the clients I accept. Its such an awesome system. I can't believe someone hasn’t thought of this sooner! Being a single parent, this is exactly what I need to have a career while being flexible enough to raise my son. Thanks!"</p>
                    </div>
                </div>             
            </div>
        </div>
    </div>
</div>

<div class="giver-register-content">
    <div id="user-1" class="register-block">
        <form method="POST" action="{{ URL::route('register') }}">
            {!! csrf_field() !!}
            <div class="s-title">
                <h2>Become a CareNation Carer</h2>
            </div>
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

<script src="{{ URL::asset('scripts/AnySlider-master/src/jquery.anyslider.js') }}"></script>
<script>
    jQuery(function($){
         $('#the-slider').anyslider({
            'showControls' : false,
            'interval' : 5000,
            'speed' : 800 

         });

         $("#g-register").click(function(e){
            e.preventDefault();
            $('html, body').animate({
            scrollTop: $("#user-1").offset().top
        }, 2000);
         });

    });
</script>

@endsection