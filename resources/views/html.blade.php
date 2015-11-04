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
		<script src="{{URL::asset('scripts/script.js') }}"></script>
		<script src="{{URL::asset('scripts/rateit/src/jquery.rateit.min.js') }}"></script>
		<link rel="stylesheet" href="{{URL::asset('scripts/rateit/src/rateit.css') }}">
	</head>
	<body ng-app="myApp">
		<header id="site-header">
			<div class="header-top">
					<nav id="sub-nav">
						<ul>
							<li><a href="#">FAQS</a></li>
							<li> | </li>
							<li><a href="#">ABOUT US</a></li>
							<li> | </li>
							<li><a href="#">CONTACT US</a></li>
						</ul>
					</nav>
			</div>
			<div class="header-content">
					<div class="logo">
						<a href="#"><img src="{{ URL::asset('images/logo.png') }}" alt=""></a>
					</div>		
				</div>
		</header>
		<div class="page-main">
			<div class="page-content">
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
			<div class="page-sidebar">
				@if(Auth::check())
				<div class="user-block">
					@if(isset($user_info))
						<img src="{{ URL::asset('images/user/'.$user_info->picture) }}" alt="">
					@endif
						<h2 class="user-name">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h2>
						<p>Care {{ Auth::user()->user_type }}</p>
						<div class="user-block-btns">
							@if (Auth::user() -> user_type == 'giver')
								<a id="view-profile-btn" href="{{ URL::route('care_givers.show', array('uid' => Auth::user()->id)) }}" >View Profile</a>
							@elseif (Auth::user() -> user_type == 'seeker')
								<a id="view-profile-btn"  href="{{ URL::route('care_seekers.show', array('uid' => Auth::user()->id)) }}">View Porfile</a>
							@endif
								<a id="logout-btn" href="{{ URL::route('logout') }}">Logout</a>
						</div>
				</div>
				@endif
				<nav id="site-nav">
					<ul>
						@if (Auth::guest())
							<li><a href="{{ URL::route('login') }}">Login</a></li>
							<li><a href="{{ URL::route('register') }}">Register</a></li>
						@else
							@if (Auth::user() -> user_type == 'giver')
							<li><a href="{{ URL::route('care_givers.show', array('uid' => Auth::user()->id)) }}" >My Profile</a></li>
							<li><a href="{{ URL::route('job.search', array('uid' => Auth::user()->id)) }}">View Jobs</a></li>
							@elseif (Auth::user() -> user_type == 'seeker')
							<li><a href="{{ URL::route('care_seekers.show', array('uid' => Auth::user()->id)) }}">My Porfile</a></li>
							<li><a href="{{ URL::route('job.create', array('uid' => Auth::user()->id)) }}">Post a job</a></li>
							<li><a href="{{ URL::route('care_givers.list')}}">Find Givers</a></li>
							<li><a href="{{ URL::route('job.list', array('poster_id' => Auth::user()->id)) }}">My posted jobs</a></li>
							@endif
							<li><a href="{{ URL::route('message.inbox') }}">My messages</a></li>
							<li><a href="{{ URL::route('logout') }}">Logout</a></li>
							{{-- dd(Auth::user()->toArray()) --}}						
						@endif
					</ul>
				</nav>
			</div>
		</div>
		
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
						<a href="#">Terms & Privacy</a>
					</p>
				</div>

				<div class="footer-3">
					<p>Important Notice: While we verify certain key information (police checks, key qualifications, references) during the on-boarding of each carer, carers’ represent other information about themselves to customers via their profiles that we do not independently verify. In exercising your choice of carer(s) and hiring them directly, we recommend that you check their credentials and original documents when you first meet them and provide ongoing supervision. We recommend that carers take a file of their key documents with them to their first meeting.</p>
				</div>
			</div>
		</footer>
	</body>
</html>