@extends('admin.master')

@section('content')

<div class="profile-block">
	<div class="profile-row">
		<div class="row">
			<div class="col-1">
				<div class="profile-image block">
					<img src="{{ URL::asset('images/user/'.$the_giver->picture) }}" alt="">
				</div>
				<div class="profile-info">
					<h2 class="profile-name">
						{{ $the_user->firstname }} {{ $the_user -> lastname }}
					</h2>		
					<div class="gender">
						{{ $the_giver->gender }}@if ($the_giver->live_in)&nbsp;&nbsp;|&nbsp;&nbsp;Live In @endif
					</div>
					<div class="user-location">
						{{ $the_giver->suburb }},{{ $the_giver->state }}
					</div>
					@if (Auth::user()->user_type == 'admin')
					<div class="user-status">			
							<label for="status">User Status: </label>
							<select name="status" id="user-status">
								<option value="{{ $the_user->status }}">{{ $the_user->status }}</option>
								<option value="Active">Active</option>
								<option value="Inactive">Inactive</option>
							</select>
					</div>
					<div class="bg-check">
						<a class="dark-blue-btn" href="{{ URL::asset('uploaded_files/user/'.$the_giver->background_check) }}" target="_blank">Background Check</a>
					</div>		


					@endif
					@if (Auth::user()->user_type == 'seeker')
						<a class="dark-blue-btn" href="{{ URL::route('message.create', array('to_id'=>$the_giver -> uid )) }}">Send a message</a>

						
					@endif
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
			</div>
		</div>

		<div class="row">
			<div class="col-1">
			<div class="profile-contact block">
				<h2 class="block-title">Contact
					@if(Auth::user()->id == $the_user->id)
					<a class="edit-btn" href="{{ URL::route('care_givers.edit', array('id'=>$the_user->id)) }}">Edit</a>				
					@endif
				</h2>
				<div class="block-content">
					<p>Email: {{ $the_user->email }}</p>
					<p>Phone: {{ $the_user->phone }}</p>
					<p>Address: {{ $the_giver->address1 }}</p>
					<p>Address: {{ $the_giver->address2 }}</p>
					<p>Suburb: {{ $the_giver->suburb }}</p>
					<p>State: {{ $the_giver->state }}</p>
					<p>Postcode: {{ $the_giver->postcode }}</p>
				</div>
			</div>
			</div>
		</div>

		<div class="row">
			<div class="col-1">
			<div class="block">
				<h2 class="block-title">Bio
					@if(Auth::user()->id == $the_user->id)
					<a class="edit-btn" href="{{ URL::route('care_givers.edit2', array('id'=>$the_user->id)) }}">Edit</a>
					@endif
				</h2>
				<div class="block-content">
				{{ $the_giver->bio }}
				</div>
			</div>
			</div>
		</div>

		<div class="row">
			<div class="col-1">
			<div class="block">
				<h2 class="block-title">Experiece
					@if(Auth::user()->id == $the_user->id)
					<a class="edit-btn" href="{{ URL::route('care_givers.edit2', array('id'=>$the_user->id)) }}">Edit</a>
					@endif
				</h2>
				<div class="block-content">
				{{ $the_giver->experience }}
				</div>
			</div>
			</div>
		</div>

		<div class="row">
			<div class="col-1">
			<div class="block">
				<h2 class="block-title">Education
					@if(Auth::user()->id == $the_user->id) 
					<a class="edit-btn" href="{{ URL::route('care_givers.edit2', array('id'=>$the_user->id)) }}">Edit</a>
					@endif
				</h2>
				<div class="block-content">
					{{ $the_giver->education }}
				</div>
			</div>
			</div>
		</div>

		<div class="row">
			<div class="col-2">
				<div class="block">
					<h2 class="block-title">Service categories 
						@if(Auth::user()->id == $the_user->id) 
						<a class="edit-btn" href="{{ URL::route('care_givers.edit3', array('id'=>$the_user->id)) }}">Edit</a>
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
			</div>

			

			<div class="col-2">
				<div class="block">
					<h2 class="block-title">Rate 
						@if(Auth::user()->id == $the_user->id)
						<a class="edit-btn" href="{{ URL::route('care_givers.edit2', array('id'=>$the_user->id)) }}">Edit</a>
						@endif
					</h2>
					<div class="block-content">
						Hourly Rate: ${{ $the_giver->rate}}
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-1">
				<div class="block">
					<h2 class="block-title">Services
						@if(Auth::user()->id == $the_user->id) 
						<a class="edit-btn" href="{{ URL::route('care_givers.edit3', array('id'=>$the_user->id)) }}">Edit</a>
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
			</div>
		</div>
		<div class="row">
			<div class="col-1">
				<div class="block">
					<h2 class="block-title">My Qualifications
						@if(Auth::user()->id == $the_user->id) 
						<a class="edit-btn" href="{{ URL::route('care_givers.edit3', array('id'=>$the_user->id)) }}">Edit</a>
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
			</div>
		</div>
	@if (!empty($my_availability))
		<div class="row">
			<div class="col-1">
				<div class="block">
					<h2 class="block-title">My Availability
						@if(Auth::user()->id == $the_user->id)
						<a class="edit-btn" href="{{ URL::route('care_givers.edit3', array('id'=>$the_user->id)) }}">Edit</a>
						@endif
					</h2>
					<div class="block-content">
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
			</div>
		</div>
	</div>
</div>
@endif
<div class="row">
	<div class="col-1">
		<a class="dark-blue-btn" href="{{ URL::previous() }}">&lt; Back</a>
	</div>
</div>

<script>
	$(function(){
		$("#user-status").change(function(){
			var v = $(this).val();
			$.ajax({
					type: 'POST',
					url: "{{ URL::route('changeUserStatus') }}",
					data: { 
							"_token" : "{{ Session::token()}}",
							"uid" : {{ $the_user->id }},
							"status": $(this).val()
					},
					success: function(result){
						console.log(result);
					}
			});
		});
	});
</script>
@endsection('content')