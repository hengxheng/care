<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Care Nation</title>
		<link rel="stylesheet" href="{{ URL::asset('stylesheets/screen.css') }}">
	</head>
	<body>
		<header id="site-header">
			<nav id="site-nav" class="site-inner">
				<ul>
					@if (Auth::guest())
						<li><a href="{{ URL::route('login') }}">Login</a></li>
						<li><a href="{{ URL::route('register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle">{{ Auth::user()->name }}</a>
							<ul class="dropdown-menu" role="menu">
								@if (Auth::user()->user_type == 'giver')
								<li><a href="{{ URL::route('care_givers.create', array('uid' => Auth::user()->id)) }}">Create Profile</a>
								@endif
								<li><a href="{{ URL::route('logout') }}">Logout</a></li>
							</ul>
						</li>
						{{-- dd(Auth::user()->toArray()) --}}
					@endif
				</ul>

			</nav>
		</header>

		<div class="page-main-content site-inner">
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

		<footer id="site-footer">
			
		</footer>
		<script src="{{ URL::asset('scripts/script.js') }}"></script>
	</body>
</html>