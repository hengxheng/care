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
					</h2>
				
					<div class="block-content">
						<h3>
						@if($the_seeker->subscription_ends_at == null)
						Monthly Subcription
						@else
						Subscrtipion ends: {{ $the_seeker->subscription_ends_at }}
						@endif
					</h3>
					</div>

					<div class="block-content contact">
						<h3 class="block-title">Contact Information</h3>
						<div class="block-content">
							<ul>
								<li class="email"><p><span>Email:</span>{{ $the_user->email }}</p></li>
								<li class="phone"><p><span>Phone: </span>{{ $the_user->phone }}</p></li>
								<li class="address"><p><span>Address: </span>{{ $the_seeker->address1 }}</p></li>
								<li class="address2"><p><span>Address2: </span>{{ $the_seeker->address2 }}</p></li>
								<li class="suburb"><p><span>Suburb: </span>{{ $the_seeker->suburb }}</p></li>
								<li class="state"><p><span>State: </span>{{ $the_seeker->state }}</p></li>
								<li class="postcode"><p><span>Postcode: </span>{{ $the_seeker->postcode }}</p></li>
							</ul>
						</div>
					</div>

					<a class="edit-btn" href="{{ URL::route('care_seekers.edit', array('id'=>$the_user->id)) }}">Edit</a>
		
				</div>
			</div>
		</div>
	</div>

	<!-- <a class="btn" href="{{ URL::route('job.create', array('uid' => $the_user->id)) }}">Post a job</a> -->
	@endif
@endsection