<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Care Nation</title>
		<link rel="stylesheet" href="{{ URL::asset('style.css') }}">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="{{URL::asset('scripts/script.js') }}"></script>
		<script src="{{URL::asset('scripts/rateit/src/jquery.rateit.min.js') }}"></script>
		<link rel="stylesheet" href="{{URL::asset('scripts/rateit/src/rateit.css') }}">

		<!--Typekit-->
		<script src="https://use.typekit.net/zbk6zbg.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
	</head>
	<body ng-app="myApp" class="@yield('pageType')">
		<header id="site-header">
			<div class="header-top">
				<div class="site-inner">
					<div class="contact">
						<ul>
							<li><a href="tel:02052692359"><i class="fa fa-phone"></i>020 5269 2359</a></li>
							<li><a href="mailto:support@carenation.com.au"><i class="fa fa-envelope"></i>support@carenation.com</a></li>
						</ul>
					</div>

					<nav id="sub-nav">
						<ul>
							<li><a href="/faqs">FAQs</a></li>		
							<li><a href="/about">About Us</a></li>		
							<li><a href="/contact">Contact Us</a></li>
							<li><a href="/privacy-policy">Privacy Policy</a></li>
							<li><a href="/terms-conditions">Terms &amp; Conditions</a></li>
							<li><a href="/terms-of-use">Terms of Use</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="header-content">
				<div class="site-inner">
					<div class="logo">
						<a href="#"><img src="{{ URL::asset('images/logo.png') }}" alt=""></a>
					</div>	

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
							<li><a href="{{ URL::route('account.settings') }}">Account Settings</a></li>
							@if (Auth::user()->user_type == 'seeker')
							<li><a href="{{ URL::route('seeker.payment') }}">Payments</a></li>
							@endif
							<li><a id="logout-btn" href="{{ URL::route('logout') }}">Logout</a></li>
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
						<a href="#" id="mb-btn"><i class="fa fa-bars"></i></a>
						<div id="main-menu-block">
							<ul>
								@if (Auth::guest())
									<li><a href="{{ URL::route('login') }}">Login</a></li>
									<li><a href="{{ URL::route('register') }}">Register</a></li>
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
											  <span class="msg-notify">{{ $unread }}</span>
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
			<div class="page-content site-inner">
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
						@foreach ( $errors->all() as $error )
							<p>{{ $error }}</p>
						@endforeach
					</div>
				@endif

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
							<li><a href="#"><i class="fa fa-twitter"></i>@CareNation</a></li>
							<li><a href="#"><i class="fa fa-facebook"></i>/CareNation</a></li>
						</ul>
					</span>
				</div>

				<div class="fourth">
					<h3>Useful Links</h3>

					<ul>
						<li>FAQs</li>
						<li>About CareNation</li>
						<li>Contact Us</li>
						<li>Privacy Policy</li>
						<li>Terms &amp; Conditions</li>
					</ul>
				</div>

				<div class="fourth">
					<h3>Contact Us</h3>
						
					<ul class="contact-details">
						<li class="phone"><a href="">020 5269 2359</a></li>
						<li class="email"><a href="">support@carenation.com.au</a></li>
						<li class="address">123 Care Street, <br />Sydney, <br />New South Wales, <br />2020 </li>

						<li class="map"><a hrefr="#">View map</a></li>
					</ul>
				</div>

				<div class="fourth">
					<h3>Important Information</h3>
					<p>While we verify certain key information (police checks, key qualifications, references) during the on-boarding of each carer, carers’ represent other information about themselves to customers...</p>
				</div>
			</div>
		</footer>
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
  });
</script>
</html>