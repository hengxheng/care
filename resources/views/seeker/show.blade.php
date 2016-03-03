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
						Subscrtipion ends: {{ $the_seeker->subscription_ends_at }}
						@endif
					</h3>

					<div class="block-bio">
						<!-- <h3>About Me - This needs to be dynamic</h3> -->

						<!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget orci eget risus cursus posuere nec a nulla. Sed et dictum mauris. Nullam fermentum tortor quis felis eleifend iaculis. Vivamus odio ex, tempor vitae massa porttitor, convallis tempor odio. Integer rhoncus rhoncus dictum. Pellentesque interdum lacus justo, a ultrices risus euismod non. Etiam convallis sapien in finibus aliquet. Sed rhoncus nec felis non suscipit. Sed in massa ut lectus porttitor finibus nec vitae arcu.</p> -->
					</div>


			</div>
		</div>
	</div>

	<!-- <a class="btn" href="{{ URL::route('job.create', array('uid' => $the_user->id)) }}">Post a job</a> -->
	@endif
@endsection