@extends('html')

@section('pageType', 'giver-profile')
@endsection

@section('content')

<div class="profile-block">
	<div class="profile-row">
		<aside class="contact">
			<div class="profile-image block">
				<img src="{{ URL::asset('images/user/'.$the_user->picture) }}" alt="">
			</div>

			<p style="text-transform: capitalize;"><i class="fa fa-venus-mars"></i> {{ $the_giver->gender }}@if ($the_giver->live_in)&nbsp;&nbsp;|&nbsp;&nbsp;Live In @endif</p>

			@if($the_user->status == "Active")
			<p class="success"><i class="fa fa-check"></i> Verified</p>
			@else
			<p class="success"><i class="fa fa-times"></i> Not verified</p>
			@endif
			

			@if(Auth::user()->id == $the_user->id)
			<h3 class="block-title">Contact Information</h3>
			
			<ul>
				<li class="email"><span>Email</span>{{ $the_user->email }}</li>
				<li class="phone"><span>Phone</span>{{ $the_user->phone }}</li>
				<li class="address"><span>Address</span>{{ $the_giver->address1 }}, <br />{{ $the_giver->suburb }}, <br />{{ $the_giver->state }}, <br />{{ $the_giver->postcode }}</li>
			</ul>

			<a class="edit-btn" href="{{ URL::route('care_givers.edit', array('id'=>$the_user->id)) }}"><i class="fa fa-pencil"></i></a>	
			@endif

			@if (Auth::user()->user_type == 'seeker' )
			<a class="dark-blue-btn" href="{{ URL::route('message.create', array('to_id'=>$the_giver -> uid )) }}"><i class="fa fa-envelope"></i>Send a message</a>
			@endif
		</aside>

		<div class="content">
			<div class="profile-info">
				<h2 class="profile-name">
					{{ camel_case($the_user->firstname) }} {{ camel_case($the_user->lastname) }}
				</h2>	
			</div>

			<div class="rating-block">
				<h3>My Rating</h3>
				<div class="rating">
					@if($my_rating >0 )
					@for ($i=0; $i < $my_rating; $i++)
					<i class="fa fa-star fa-2x"></i>
					@endfor
					@else
					This Care Giver has not been rated by any Care Seekers yet
					@endif
				</div>
			</div>

			
			<div class="block">
				<h2 class="block-title">Bio
					@if(Auth::user()->id == $the_user->id)
					<a class="edit-btn" href="{{ URL::route('care_givers.edit2', array('id'=>$the_user->id)) }}"><i class="fa fa-pencil"></i></a>
					@endif
				</h2>
				<div class="block-content">
					<p>{{ $the_giver->bio }}</p>
				</div>
			</div>

			<div class="block">
				<h2 class="block-title">Experiece
					@if(Auth::user()->id == $the_user->id)
					<a class="edit-btn" href="{{ URL::route('care_givers.edit2', array('id'=>$the_user->id)) }}"><i class="fa fa-pencil"></i></a>
					@endif
				</h2>
				<div class="block-content">
					<p>{{ $the_giver->experience }}</p>
				</div>
			</div>

			<div class="block education">
				<h2 class="block-title">Education
					@if(Auth::user()->id == $the_user->id) 
					<a class="edit-btn" href="{{ URL::route('care_givers.edit2', array('id'=>$the_user->id)) }}"><i class="fa fa-pencil"></i></a>
					@endif
				</h2>
				<div class="block-content">
					<p>{{ $the_giver->education }}</p>
				</div>
			</div>

			<div class="block service-cats">
				<h2 class="block-title">Care Specialties
					@if(Auth::user()->id == $the_user->id) 
					<a class="edit-btn" href="{{ URL::route('care_givers.edit3', array('id'=>$the_user->id)) }}"><i class="fa fa-pencil"></i></a>
					@endif
				</h2>
				<div class="block-content">
					<ul class="service-list">
						@foreach ($my_services as $s)
						<li>
							<div class="{{ str_slug($s->service_name, '-') }} service-icon">
								{{ $s->service_name }}
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>

			<div class="block service-rate">
				<h2 class="block-title">Rate 
					@if(Auth::user()->id == $the_user->id)
					<a class="edit-btn" href="{{ URL::route('care_givers.edit2', array('id'=>$the_user->id)) }}"><i class="fa fa-pencil"></i></a>
					@endif
				</h2>
				<div class="block-content">
					Hourly Rate: ${{ $the_giver->rate}}
				</div>
			</div>

			<div class="block services">
				<h2 class="block-title">Services
					@if(Auth::user()->id == $the_user->id) 
					<a class="edit-btn" href="{{ URL::route('care_givers.edit3', array('id'=>$the_user->id)) }}"><i class="fa fa-pencil"></i></a>
					@endif
				</h2>
				<div class="block-content">
					<ul>
						@foreach ($my_services2 as $s)
						<li>
							<div class="{{ str_slug($s->service_name, '-') }}">
								{{ $s->service_name }}
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>

			<div class="block qualifications">
				<h2 class="block-title">My Qualifications
					@if(Auth::user()->id == $the_user->id) 
					<a class="edit-btn" href="{{ URL::route('care_givers.edit3', array('id'=>$the_user->id)) }}"><i class="fa fa-pencil"></i></a>
					@endif
				</h2>
				<div class="block-content">
					<ul>
						@foreach ($my_quolifications as $q)
						<li>{{ $q-> quolification_name }}</li>
						@endforeach
					</ul>
				</div>
			</div>
			
			@if (!empty($my_availability))
			<div class="block availabilty" >
				<h2 class="block-title">My Availability
					@if(Auth::user()->id == $the_user->id)
					<a class="edit-btn" href="{{ URL::route('care_givers.edit3', array('id'=>$the_user->id)) }}"><i class="fa fa-pencil"></i></a>
					@endif
				</h2>
				<div class="block-content" style="padding:0;">
					<table id="avaiability-table">
						<tr>
							<td></td>
							<td>Mon</td>
							<td>Tue</td>
							<td>Wed</td>
							<td>Thu</td>
							<td>Fri</td>
							<td>Sat</td>
							<td>Sun</td>
						</tr>
						<tr>
							<td>Morning</td>
							<td><div class="av-icon a-{{ $my_availability['mon']['morning'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['tue']['morning'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['wed']['morning'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['thu']['morning'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['fri']['morning'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['sat']['morning'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['sun']['morning'] }}"></div></td>
						</tr>
						<tr>
							<td>Afternoon</td>
							<td><div class="av-icon a-{{ $my_availability['mon']['afternoon'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['tue']['afternoon'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['wed']['afternoon'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['thu']['afternoon'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['fri']['afternoon'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['sat']['afternoon'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['sun']['afternoon'] }}"></div></td>
						</tr>
						<tr>
							<td>Everning</td>
							<td><div class="av-icon a-{{ $my_availability['mon']['everning'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['tue']['everning'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['wed']['everning'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['thu']['everning'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['fri']['everning'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['sat']['everning'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['sun']['everning'] }}"></div></td>
						</tr>
						<tr>
							<td>Overnight</td>
							<td><div class="av-icon a-{{ $my_availability['mon']['overnight'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['tue']['overnight'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['wed']['overnight'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['thu']['overnight'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['fri']['overnight'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['sat']['overnight'] }}"></div></td>
							<td><div class="av-icon a-{{ $my_availability['sun']['overnight'] }}"></div></td>
						</tr>
					</table>
				</div>
			</div>
			@endif
			
			@if(Auth::user()->id != $the_user->id) 

			<div class="block rating">
				<div class="block-title">
					Rating
				</div>
				<div class="block-content">
					<div id="rateit" class="rateit"></div>
				</div>
				
				<script>
				$(function(){
					$("#rateit").bind('rated', function(event, value) { 
						var ratedby = {{ Auth::user()->id }};
						var ratefor = {{ $the_user->id }};
						$.ajax({
							type: 'POST',
							url: '{{ URL::route("rating.index") }}',
							data: { 
								"_token" : "{{ Session::token()}}",
								"rate_uid" : ratefor,
								"rateby_uid" : ratedby,
								"rate_star" : value
							},
							success: function(result){
								console.log(result);
							}
						});
					});
				});
				</script>				
			</div>
			
			@if (Auth::user()->user_type == "seeker")
			<div class="block">
				<div class="block-title"></div>
				<a class="dark-blue-btn back" href="{{ URL::previous() }}">Back</a>
			</div>
				
			@endif
			@endif

		</div>




	</div>

</div>
</div>
</div>




@endsection('content')