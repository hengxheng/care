<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Care Nation</title>
		<link rel="stylesheet" href="/css/style.css">
	</head>
	<body>
		<header id="site-header">
			<nav id="site-nav">
				<ul>
					<li></li>
					<li></li>
					<li></li>
				</ul>
			</nav>
		</header>

		<div class="page-main-content">
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