@extends('html')

@section('content')
<div class="giver-profile-block">
	<div class="profile-row row">
		<div class="profile-image">
			<img src="{{ $the_giver -> picture }}" alt="">
		</div>
		<div class="profile-name">
			{{ $the_user -> firstname }} {{ $the_user -> lastname }}
			<p>
				@if (Auth::user() -> user_type == 'seeker' )
				<a href="{{ URL::route('message.create', array('to_id'=>$the_giver -> uid )) }}">Send a message</a>
				@endif
			</p>
		</div>
		<div class="profile-gender">
			{{ $the_giver -> gender }}
		</div>
		<div class="profile-contact">
			<p>Email : {{ $the_user -> email }}</p>
			<p>Phone : {{ $the_user -> phone }}</p>
			<p>Address : {{ $the_giver -> address1 }}</p>
			<p>{{ $the_giver -> address2 }}</p>
			<p>{{ $the_giver -> suburb }}</p>
			<p>{{ $the_giver -> state }}</p>
			<p>{{ $the_giver -> postcode }}</p>
		</div>
	</div>
</div>
@endsection('content')