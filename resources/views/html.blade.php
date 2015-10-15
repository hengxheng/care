<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Care Nation</title>
		<link rel="stylesheet" href="{{ URL::asset('stylesheets/screen.css') }}">
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script>
		<script src="{{URL::asset('scripts/script.js') }}"></script>
	</head>
	<body ng-app="myApp">
		<header id="site-header">
			<nav id="site-nav" class="site-inner">
				<ul>
					@if (Auth::guest())
						<li><a href="{{ URL::route('login') }}">Login</a></li>
						<li><a href="{{ URL::route('register') }}">Register</a></li>
					@else
						@if (Auth::user() -> user_type == 'giver')
						<li><a href="{{ URL::route('care_givers.create', array('uid' => Auth::user()->id)) }}">Create Profile</a>
						<li><a href="{{ URL::route('care_givers.show', array('uid' => Auth::user()->id)) }}" >My Profile</a></li>
						<li><a href="{{ URL::route('job.search', array('uid' => Auth::user()->id)) }}">View Jobs</a></li>
						@elseif (Auth::user() -> user_type == 'seeker')
						<li><a href="{{ URL::route('care_seekers.create', array('uid' => Auth::user()->id)) }}">My Porfile</a></li>
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
		</header>

		<div class="page-main-content site-inner">
			<div class="welcome">
				@if (Auth::user())
					<p>Welcome {{Auth::user() -> firstname }}</p>
				@endif
			</div>
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
	</body>
</html>