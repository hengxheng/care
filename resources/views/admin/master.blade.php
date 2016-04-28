<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Care Nation</title>
		<link rel="stylesheet" href="{{ URL::asset('style.css') }}">
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="{{URL::asset('scripts/script.js') }}"></script>
		<script src="{{URL::asset('scripts/pushy.min.js') }}"></script>

		<!--Typekit-->
		<script src="https://use.typekit.net/zbk6zbg.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
	</head>
	<body ng-app="myApp">
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
			

			@if(Auth::check())
				<ul>
					<li><a href="{{ URL::route('admin.index') }}">Dashboard</a></li>
					<li><a href="{{ URL::route('admin.givers.list') }}">Care givers</a></li>
					<li><a href="{{ URL::route('admin.seekers.list') }}">Care seekers</a></li>
				</ul>
			@else
				<h2 style="color: #fff;">Admin Login</h2>
			@endif

		</nav>
		
		<div class="site-overlay"></div>

		<header id="site-header">
			<div class="header-top">
				<div class="site-inner">
					<div class="contact">
						<ul>
							<li><a href="mailto:info@carenation.com.au"><i class="fa fa-envelope"></i><span>info@carenation.com</span></a></li>
						</ul>
					</div>

					<nav id="sub-nav">
						<ul>
							<li><a href="/about">About Us</a></li>							
							<li><a href="/terms-conditions">Terms &amp; Conditions</a></li>
							<li><a href="/privacy-policy">Privacy Policy</a></li>
							<li><a href="/terms-conditions">Terms &amp; Conditions</a></li>
							<li><a href="/terms-of-use">Terms of Use</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="/faqs">FAQs</a></li>	
							<li><a href="/contact">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="header-content">
				<div class="site-inner">
					<div class="logo">
						<a href="#"><img src="{{ URL::asset('images/logo.png') }}" alt=""></a>
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
									<p class="user-type">Administrator</p>
								</div>			
								<a id="account-down" href="#"><i class="fa fa-chevron-down"></i></a>		
							</div>
							<div id="account-block-menu">
								<ul>
									<!-- <li><a href="{{ URL::route('account.settings') }}"><i class="fa fa-cogs"></i> Account Settings</a></li> -->
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
						<!-- <a href="#" id="mb-btn"><i class="fa fa-bars"></i></a> -->
						<div id="main-menu-block">
							@if(Auth::check())
								<ul>
									<li><a href="{{ URL::route('admin.index') }}">Dashboard</a></li>
									<li><a href="{{ URL::route('admin.givers.list') }}">Care givers</a></li>
									<li><a href="{{ URL::route('admin.seekers.list') }}">Care seekers</a></li>
								</ul>
							@else
								<h2 style="color: #fff;">Admin Login</h2>
							@endif
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
	</body>
</html>