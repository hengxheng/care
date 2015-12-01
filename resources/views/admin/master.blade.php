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
				<div class="user-block">
					@if (Auth::check())
					<p>Care {{ Auth::user()->user_type }}</p>
					
					<div class="user-block-btns">
						<a id="logout-btn" href="{{ URL::route('logout') }}">Logout</a>
					</div>
					@endif
				</div>
				<nav id="site-nav">
					<ul>
						
					</ul>
				</nav>
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