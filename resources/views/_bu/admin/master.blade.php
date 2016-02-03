<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Care Nation</title>
		<link rel="stylesheet" href="{{ URL::asset('stylesheets/screen.css') }}">
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
			<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="{{URL::asset('scripts/script.js') }}"></script>
	</head>
	<body ng-app="myApp">
		<header id="site-header">
			<div class="header-top">
					<nav id="sub-nav">
						<ul>
							<li><a href="/faqs">FAQS</a></li>
							<li class="sep">|</li>
							<li><a href="/about">ABOUT US</a></li>
							<li class="sep">|</li>
							<li><a href="/contact">CONTACT US</a></li>
							<li class="sep">|</li>
							<li><a href="/privacy-policy">Privacy Policy</a></li>
							<li class="sep">|</li>
							<li><a href="/terms-conditions">Terms &amp; Conditions</a></li>
							<li class="sep">|</li>
							<li><a href="/terms-of-use">Terms of Use</a></li>
						</ul>
					</nav>
			</div>
			<div class="header-content">
					<div class="logo">
						<a href="#"><img src="{{ URL::asset('images/logo.png') }}" alt=""></a>
					</div>		
				</div>
		</header>
		<nav id="main-nav">
			<div class="site-inner">
				<div class="nav-inner">
					<nav id="site-nav">
						<a href="#" id="mb-btn"><i class="fa fa-bars"></i></a>
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
								<a id="account-down" href="#"><i class="fa fa-chevron-circle-down"></i></a>		
							</div>
							<div id="account-block-menu">
								<ul>
									<li><a href="{{ URL::route('account.settings') }}">Account Settings</a></li>
									<li><a id="logout-btn" href="{{ URL::route('logout') }}">Logout</a></li>
								</ul>	
							</div>
						</div>			
					@endif
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
		<footer id="site-footer">
			<div class="footer-content">
				<div class="footer-1">
					<a href="/"><img src="{{ URL::asset('images/logo.png') }}" alt=""></a>
				</div>
				<div class="footer-2">
					<p>Copyright CareNation Pty Ltd. All rights reserved.</p>
					<p class="footer-links">
						<a href="#">About</a> 
						&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="#">Careers</a>
						&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="#">Blog</a>
						&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="#">FAQs</a>
						&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="/privacy-policy">Privacy Policy</a>
						&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="/terms-conditions">Terms & Conditions</a>
						&nbsp;&nbsp;|&nbsp;&nbsp;
						<a href="/terms-of-use">Terms of Use</a>
					</p>
				</div>

				<div class="footer-3">
					<p>Important Notice: While we verify certain key information (police checks, key qualifications, references) during the on-boarding of each carer, carers’ represent other information about themselves to customers via their profiles that we do not independently verify. In exercising your choice of carer(s) and hiring them directly, we recommend that you check their credentials and original documents when you first meet them and provide ongoing supervision. We recommend that carers take a file of their key documents with them to their first meeting.</p>
				</div>
			</div>
		</footer>
	</body>
</html>