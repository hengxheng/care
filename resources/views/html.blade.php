<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Care Nation</title>
		<link rel="stylesheet" href="{{ URL::asset('stylesheets/screen.css') }}">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.7/angular.min.js"></script> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="{{URL::asset('scripts/script.js') }}"></script>
		<script src="{{URL::asset('scripts/rateit/src/jquery.rateit.min.js') }}"></script>
		<link rel="stylesheet" href="{{URL::asset('scripts/rateit/src/rateit.css') }}">
	</head>
	<body ng-app="myApp">
		<header id="site-header">
			<div class="header-top">
				<div class="site-inner">
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
			</div>
			<div class="header-content">
				<div class="site-inner">
					<div class="logo">
						<a href="#"><img src="{{ URL::asset('images/logo.png') }}" alt=""></a>
					</div>		
				</div>
			</div>
		</header>
		<nav id="main-nav">
			<div class="site-inner">
			<nav id="site-nav">
				<ul>
					@if (Auth::guest())
						<li><a href="{{ URL::route('login') }}">Login</a></li>
						<li><a href="{{ URL::route('register') }}">Register</a></li>
					@elseif(Auth::user()->status == 'Active')
							@if (Auth::user() -> user_type == 'giver')
								<li><a href="{{ URL::route('care_givers.show', array('uid' => Auth::user()->id)) }}" >My Profile</a></li>
								<li><a href="{{ URL::route('job.search', array('uid' => Auth::user()->id)) }}">View Jobs</a></li>
								<li><a href="{{ URL::route('job.applied', array('uid' => Auth::user()->id)) }}">Applied Jobs</a></li>
							@elseif (Auth::user()->user_type == 'seeker')
								<li><a href="{{ URL::route('care_seekers.show', array('uid' => Auth::user()->id)) }}">My Profile</a></li>
								<li><a href="{{ URL::route('job.create', array('uid' => Auth::user()->id)) }}">Post a job</a></li>
								<li><a href="{{ URL::route('care_givers.list')}}">Find Caregivers</a></li>
								<li><a href="{{ URL::route('job.list', array('poster_id' => Auth::user()->id)) }}">My posted jobs</a></li>
							@endif
							<li><a href="{{ URL::route('message.inbox') }}">Inbox 
								@if(isset($unread))
								  <span class="msg-notify">{{ $unread }}</span>
								@endif
							</a></li>
					@elseif (Auth::user()->status == 'Pending')
							<li>To apply for jobs, you must first verify your account by adding a background check approved by us.</li>
					@endif
				</ul>
			</nav>
			@if(Auth::check())
				<div class="account-block">
					<div class="account-block-img">
						<img src="{{ URL::asset('images/user/'.Auth::user()->picture) }}" alt="">
					</div>	
					<div class="account-block-content">
						<h2 class="user-name">
							{{ camel_case(Auth::user()->firstname) }} {{ camel_case(Auth::user()->lastname) }}
						</h2>
						<p class="user-type">Care {{ Auth::user()->user_type }}</p>
					</div>			
					<a id="account-down" href="#"><i class="fa fa-chevron-circle-down"></i></a>		
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
			<div class="footer-content site-inner">
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

<script>
  $(function() {
  	var base_url = "http://localhost/care/public/";
  	$("#state-dropdown").change(function(){
  		var state = $(this).val();
  		$.ajax({
  			type: "POST",
  			url: base_url+"getsuburbs",
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