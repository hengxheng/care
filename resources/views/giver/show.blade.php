@extends('html')

@section('content')
<div class="giver-profile-block">
	<div class="profile-row">
		<div class="row">
			<div class="profile-image block">
				<img src="{{ URL::asset('images/'.$the_giver -> picture) }}" alt="">
			</div>
			<div class="profile-name block">
				<div class="block-content">
				{{ $the_user -> firstname }} {{ $the_user -> lastname }}
				<p>
					@if (Auth::user() -> user_type == 'seeker' )
					<a href="{{ URL::route('message.create', array('to_id'=>$the_giver -> uid )) }}">Send a message</a>
					@endif
				</p>

				<p>{{ $the_giver -> gender }}</p>
				</div>
			</div>
		</div>
		<div class="profile-contact block">
			<h2 class="block-title">Contact</h2>
			<div class="block-content">
				<p>Email : {{ $the_user -> email }}</p>
				<p>Phone : {{ $the_user -> phone }}</p>
				<p>Address : {{ $the_giver -> address1 }}</p>
				<p>{{ $the_giver -> address2 }}</p>
				<p>{{ $the_giver -> suburb }}</p>
				<p>{{ $the_giver -> state }}</p>
				<p>{{ $the_giver -> postcode }}</p>
			</div>
		</div>


		<div class="block">
			<h2 class="block-title">Experiece</h2>
			<div class="block-content">
			{{ $the_giver -> experience }}
			</div>
		</div>

		<div class="block">
			<h2 class="block-title">Education</h2>
			<div class="block-content">
				{{ $the_giver -> education }}
			</div>
		</div>

		<div class="block">
			<h2 class="block-title">Hourly Rate : {{ $the_giver->rate}}</h2>
		</div>

		<div class="block">
			<h2 class="block-title">My Services</h2>
			<div class="block-content">
				<ul>
					@foreach ($my_services as $s)
					<li>{{ $s-> service_name }}</li>
					@endforeach
				</ul>
			</div>
		</div>

		<div class="block">
			<h2 class="block-title">My Quolifications</h2>
			<div class="block-content">
				<ul>
					@foreach ($my_quolifications as $q)
					<li>{{ $q-> quolification_name }}</li>
					@endforeach
				</ul>
			</div>
		</div>
	</div>
</div>
@endsection('content')