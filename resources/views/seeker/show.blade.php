@extends ('html')
@section ('content')
	@if($the_user->user_type == "seeker")
	<div class="profile-block">

		<div class="row">
			<div class="col-1">
				<div class="profile-image block">
					<img src="{{ URL::asset('images/user/'.$the_user->picture) }}" alt="">
				</div>
				<div class="profile-info">
					<h2 class="profile-name">
						{{ camel_case($the_user->firstname) }} {{ camel_case($the_user->lastname) }}
						@if (Auth::user()->id == $the_user->id || Auth::user()->user_type == "Admin")
							<span style="font-size:12px;">
								[Last Login: {{ date('F d Y', strtotime(Auth::user()->last_login)) }}]
							</span>
						@endif
					</h2>
				
					<div class="block-content">
						@if($the_seeker->subscription_ends_at == null)
						Monthly Subcription
						@else
						Subscrtipion ends: {{ $the_seeker->subscription_ends_at }}
						@endif
					</div>
		
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-1">
				<div class="profile-contact block">
					<h2 class="block-title">Contact <a class="edit-btn" href="{{ URL::route('care_seekers.edit', array('id'=>$the_user->id)) }}">Edit</a></h2>
					<div class="block-content">
						<p>Email: {{ $the_user->email }}</p>
						<p>Phone: {{ $the_user->phone }}</p>
						<p>Address: {{ $the_seeker->address1 }}</p>
						<p>Address2: {{ $the_seeker->address2 }}</p>
						<p>Suburb: {{ $the_seeker->suburb }}</p>
						<p>State: {{ $the_seeker->state }}</p>
						<p>Postcode: {{ $the_seeker->postcode }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- <a class="btn" href="{{ URL::route('job.create', array('uid' => $the_user->id)) }}">Post a job</a> -->
	@endif
@endsection