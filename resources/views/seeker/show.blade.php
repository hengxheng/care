@extends ('html')
@section ('content')
	@if($the_user->user_type == "seeker")
	<div class="seeker-profile">

		<div class="row">
			<div class="profile-image block">
				<img src="{{ URL::asset('images/'.$the_seeker -> picture) }}" alt="">
			</div>
			<div class="profile-name block">
				<div class="block-content">
				{{ $the_user -> firstname }} {{ $the_user -> lastname }}
				</div>
			</div>
		</div>
		<div class="profile-contact block">
			<h2 class="block-title">Contact <span><a href="{{ URL::route('care_seekers.edit', array('id'=>$the_user->id)) }}">Edit</a></span></h2>
			<div class="block-content">
				<p>Email : {{ $the_seeker -> email }}</p>
				<p>Phone : {{ $the_seeker -> phone }}</p>
				<p>Address : {{ $the_seeker -> address1 }}</p>
				<p>{{ $the_seeker -> address2 }}</p>
				<p>{{ $the_seeker -> suburb }}</p>
				<p>{{ $the_seeker -> state }}</p>
				<p>{{ $the_seeker -> postcode }}</p>
			</div>
		</div>
	</div>

	<a class="btn" href="{{ URL::route('job.create', array('uid' => $the_user->id)) }}">Post a job</a>
	@endif
@endsection