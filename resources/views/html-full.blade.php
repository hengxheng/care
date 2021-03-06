<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<title>Care Nation</title>
		<link rel="stylesheet" href="{{ URL::asset('style.css') }}">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="{{URL::asset('scripts/script.js') }}"></script>
		<script src="{{URL::asset('scripts/pushy.min.js') }}"></script>
		<script src="{{URL::asset('scripts/rateit/src/jquery.rateit.min.js') }}"></script>
		<link rel="stylesheet" href="{{URL::asset('scripts/rateit/src/rateit.css') }}">

		<link rel="shortcut icon" href="http://localhost/CareNationWP/wp-content/themes/CareNationWP/images/favicon.png">
		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','https://connect.facebook.net/en_US/fbevents.js');

		fbq('init', '1778394842380112');
		fbq('track', "PageView");</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=1778394842380112&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->

	</head>
	<body ng-app="myApp" class="@yield('pageType')">
		<nav class="pushy pushy-left">
			@if(Auth::check())
			<div class="mini-account">
				<div class="account-block-img">
					<img src="{{ URL::asset('images/user/'.Auth::user()->picture) }}" alt="">
				</div>	
				
				<div class="account-info">
					<h2 class="user-name">{{ camel_case(Auth::user()->firstname) }} {{ camel_case(Auth::user()->lastname) }}</h2>
					<p class="user-type">Care {{ Auth::user()->user_type }}</p>
				</div>		
			</div>	
			@endif	
			

			<ul>
			@if (Auth::guest())
			
				<li><a href="http://www.carenation.com.au/about">About Us</a></li>			
				<li><a href="http://www.carenation.com.au/blog">Blog</a></li>
				<li><a href="http://www.carenation.com.au/faqs">FAQs</a></li>	
				<li><a href="http://www.carenation.com.au/contact">Contact</a></li>

			@elseif(Auth::user()->status == 'Active')
				@if (Auth::user() -> user_type == 'giver')
					<li><a href="{{ URL::route('care_givers.show', array('uid' => Auth::user()->id)) }}" >My Profile</a></li>
					<li><a href="{{ URL::route('job.search', array('uid' => Auth::user()->id)) }}">View Jobs</a></li>
					<li><a href="{{ URL::route('job.applied', array('uid' => Auth::user()->id)) }}">Job Submissions</a></li>
				@elseif (Auth::user()->user_type == 'seeker')
					<li><a href="{{ URL::route('care_seekers.show', array('uid' => Auth::user()->id)) }}">My Profile</a></li>
					<li><a href="{{ URL::route('job.create', array('uid' => Auth::user()->id)) }}">Post a job</a></li>
					<li><a href="{{ URL::route('care_givers.list')}}">Find Caregivers</a></li>
					<li><a href="{{ URL::route('job.list', array('poster_id' => Auth::user()->id)) }}">My posted jobs</a></li>
				@endif
				<li class="inbox">
					<a href="{{ URL::route('message.inbox') }}">Inbox 
					@if(isset($unread))
						<span class="msg-notify">{{ $unread }}</span>
					@endif
					</a>
				</li>
			@elseif (Auth::user()->status == 'Pending' && Auth::user()->user_type == "giver")
				<li>To apply for jobs, you must first verify your account by adding a background check approved by us.</li>
			@endif
				@if(Auth::check())
					<li><a href="{{ URL::route('account.settings') }}">Account Settings</a></li>
					@if (Auth::user()->user_type == 'seeker')
						<li><a href="{{ URL::route('seeker.payment') }}">Payments</a></li>
					@endif
					<li><a id="logout-btn" href="{{ URL::route('logout') }}">Logout</a></li>
				@endif	
			</ul>
		</nav>

<!-- Site Overlay -->
<div class="site-overlay"></div>

<!-- Your Content -->

    

<div id="container">

		<header id="site-header">
			<div class="header-top">
				<div class="site-inner">
					<div class="contact">
						<ul>
							<!-- <li><a href="tel:02052692359"><i class="fa fa-phone"></i><span>020 5269 2359</span></a></li> -->
						<li><a href="mailto:info@carenation.com.au"><i class="fa fa-envelope"></i><span>info@carenation.com.au</span></a></li>
						</ul>
					</div>

					<nav id="sub-nav">
						<ul>
							<li><a href="http://www.carenation.com.au/about">About Us</a></li>				
							<li><a href="http://www.carenation.com.au/blog">Blog</a></li>
							<li><a href="http://www.carenation.com.au/faqs">FAQs</a></li>	
							<li><a href="http://www.carenation.com.au/contact">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="header-content">
				<div class="site-inner">
					<div class="logo">
						<a href="http://www.carenation.com.au"><img src="{{ URL::asset('images/logo.png') }}" alt=""></a>
					</div>	

					<div class="menu-btn"><i class="fa fa-bars"></i></div>

					@if(Auth::check())
				<div class="account-block">
					<div class="account-inner">
						<div class="account-block-img">
							<img src="{{ URL::asset('images/user/'.Auth::user()->picture) }}" alt="">
						</div>	
						<div class="account-block-content">
							<h2 class="user-name">
								{{ camel_case(Auth::user()->firstname) }} {{ camel_case(Auth::user()->lastname) }}
							</h2>
							<p class="user-type">Care {{ Auth::user()->user_type }}</p>
						</div>			
						<a id="account-down" href="#"><i class="fa fa-chevron-down"></i></a>		
					</div>
					<div id="account-block-menu">
						<ul>
							<li><a href="{{ URL::route('account.settings') }}"><i class="fa fa-cogs"></i> Account Settings</a></li>
							@if (Auth::user()->user_type == 'seeker')
							<li><a href="{{ URL::route('seeker.payment') }}"><i class="fa fa-usd"></i> Payments</a></li>
							@endif
							<li><a id="logout-btn" href="{{ URL::route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
						</ul>	
					</div>
				</div>
				
			@endif	
				</div>
			</div>
		</header>
		<nav id="main-nav">
			<div class="site-inner">
				<div class="nav-inner">
					<nav id="site-nav">
						<div id="main-menu-block">
							<ul>
								@if (Auth::guest())
									<li><a href="{{ URL::route('register') }}">Join Now</a></li>
									<li><a href="{{ URL::route('login') }}">Login</a></li>
									
								@elseif(Auth::user()->status == 'Active')
										@if (Auth::user() -> user_type == 'giver')
											<li><a href="{{ URL::route('care_givers.show', array('uid' => Auth::user()->id)) }}" >My Profile</a></li>
											<li><a href="{{ URL::route('job.search', array('uid' => Auth::user()->id)) }}">View Jobs</a></li>
											<li><a href="{{ URL::route('job.applied', array('uid' => Auth::user()->id)) }}">Job Submissions</a></li>
										@elseif (Auth::user()->user_type == 'seeker')
											<li><a href="{{ URL::route('care_seekers.show', array('uid' => Auth::user()->id)) }}">My Profile</a></li>
											<li><a href="{{ URL::route('job.create', array('uid' => Auth::user()->id)) }}">Post a job</a></li>
											<li><a href="{{ URL::route('care_givers.list')}}">Find Caregivers</a></li>
											<li><a href="{{ URL::route('job.list', array('poster_id' => Auth::user()->id)) }}">My posted jobs</a></li>
										@endif
										<li class="inbox"><a href="{{ URL::route('message.inbox') }}">Inbox 
											@if(isset($unread))
											  <span class="msg-notify" @if($unread>0) style="background:red;border-color: red;color: #fff;" @endif >{{ $unread }}</span>
											@endif
										</a></li>
								@elseif (Auth::user()->status == 'Pending' && Auth::user()->user_type == "giver")
										<li>To apply for jobs, you must first verify your account by adding a background check approved by us.</li>
								@endif
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</nav>
		

		<div class="page-main">
			<div class="page-content">
				<div class="sys-message">
				@if (Session::has('message'))
					<div class="flash alert-info">
						<p>{{ Session::get('message') }}</p>
					</div>
				@endif
				@if (Session::has('status'))
					<div class="flash alert-info">
						<p>{{ Session::get('status') }}</p>
					</div>
				@endif
				@if ($errors->any())
					<div class='flash alert-danger'>
						<ul>
						@foreach ( $errors->all() as $error )
							<li>{{ $error }}</li>
						@endforeach
						</ul>
					</div>
				@endif
				</div>
				@yield('content')
			</div>
		</div>
		
		<div class="clear"></div>
		<footer id="site-footer" class="footer">
			<div class="footer-content site-inner">
				<div class="fourth">
					<a href="/"><img class="logo" src="{{ URL::asset('images/logo.png') }}" alt=""></a>

					<span class="copyright">
						<p>Copyright CareNation Pty Ltd</p>
						<p>All Rights Reserved</p>
					</span>

					<span class="social">
						<ul>
							<!-- <li><a href="#"><i class="fa fa-twitter"></i>@CareNation</a></li> -->
							<li><a href="https://www.facebook.com/CareNation-373168729475054/?ref=bookmarks" target="_blank"><i class="fa fa-facebook"></i>/CareNation</a></li>
						</ul>
					</span>

					<div class="comodo">
						<img src="{{ URL::asset('images/comodo-ssl.png') }}" alt="" style="width:200px; margin-top:30px;">
					</div>
				</div>

				<div class="fourth">
					<h3>Useful Links</h3>

					<ul>
						<li><a href="http://www.carenation.com.au/about">About Us</a></li>							
						<li><a href="http://www.carenation.com.au/terms-conditions">Terms &amp; Conditions</a></li>
						<li><a href="http://www.carenation.com.au/privacy-policy">Privacy Policy</a></li>
						<li><a href="http://www.carenation.com.au/terms-of-use">Terms of Use</a></li>
						<li><a href="http://www.carenation.com.au/blog">Blog</a></li>
						<li><a href="http://www.carenation.com.au/faqs">FAQs</a></li>	
						<li><a href="http://www.carenation.com.au/contact">Contact</a></li>
					</ul>
				</div>

				<div class="fourth">
					<h3>Contact Us</h3>
						
					<ul class="contact-details">
						<!-- <li class="phone"><a href="">020 5269 2359</a></li> -->
						<li class="email"><a href="mailto:info@carenation.com.au">info@carenation.com.au</a></li>
						<!-- <li class="address">123 Care Street, <br />Sydney, <br />New South Wales, <br />2020 </li> -->

						<!-- <li class="map"><a hrefr="#">View map</a></li> -->
					</ul>
				</div>

				<div class="fourth">
					<h3>Important Information</h3>
					<p>CareNation does not employ or recommend any care provider or care seeker nor is it responsible for the conduct of any care provider or care seeker. The CareNation website is a platform that provides tools to help care seekers and care providers connect online. Each care seeker and care provider is solely responsible for selecting a care provider or care seeker for themselves or their families and for complying with all laws in connection with any employment relationship they establish.</p>
				</div>
			</div>
		</footer>
	</div>
	</body>

<script>
  $(function() {
  	var url = "{{ URL::route('getsuburbs') }}";
  	$("#state-dropdown").change(function(){
  		var state = $(this).val();
  		$.ajax({
  			type: "POST",
  			url: url,
  			data:{
  				"state" : state,
  				"_token" : "{{ Session::token()}}"
  			},
  			success: function(result){
  				$( "#suburb-dropdown" ).autocomplete({
			      source: result
			    });
  			}
  		});
  	});

  	var url2 = "{{ URL::route('getpostcode') }}";

  	$("#suburb-dropdown").on("focusout", function(){

  		var loc = $(this).val();
  		var state = $("#state-dropdown").val();
  		$.ajax({
  			type: "POST",
  			url: url2,
  			data:{
  				"locality" : loc,
  				"state" : state,
  				"_token" : "{{ Session::token()}}"
  			},
  			success: function(result){
  				$("#postcode-field").val(result);
  			}
  		});
  	});
  });
</script>
</html>