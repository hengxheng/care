@extends ('html')
@section ('content')
	@if($the_user->user_type == "seeker")
	<div class="profile-block">
		<!--Container for image and contact deets -->
		<aside class="contact">
				<div class="profile-image block">
					<img src="{{ URL::asset('images/user/'.$the_user->picture) }}" alt="">
				</div>

				
				<ul>
					<li class="email"><p><span>Email:</span>{{ $the_user->email }}</p></li>
					<li class="phone"><p><span>Phone: </span>{{ $the_user->phone }}</p></li>
					<li class="address"><p><span>Address: </span>{{ $the_seeker->address1 }}, <br />{{ $the_seeker->address2 }}, <br />{{ $the_seeker->suburb }}, <br />{{ $the_seeker->state }}, <br />{{ $the_seeker->postcode }}</p></li>
				</ul>

				<a class="edit-btn" href="{{ URL::route('care_seekers.edit', array('id'=>$the_user->id)) }}">Edit</a>
		</aside>

		<div class="content">
			<div class="profile-info">
					<h2 class="profile-name">
						{{ camel_case($the_user->firstname) }} {{ camel_case($the_user->lastname) }}
					</h2>

					<h3>
						@if($the_seeker->subscription_ends_at == null)
						Monthly Subcription
						@else
							@if(strtotime($the_seeker->subscription_ends_at) < time())
								Subscription has Expired 
							@else								
								Subscrtipion ends: {{ date('M d, Y', strtotime($the_seeker->subscription_ends_at)) }}
							@endif
						@endif
					</h3>

					<div class="block-bio">
						@if(strtotime($the_seeker->subscription_ends_at) < time())
							Your subscription is expired. Click <a href="{{ URL::route('seeker.payment') }}">here</a> to renew.
						@endif
					</div>


			</div>
		</div>
	</div>

	@endif
@endsection