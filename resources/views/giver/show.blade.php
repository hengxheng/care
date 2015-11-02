@extends('html')

@section('content')

<div class="giver-profile-block">
	<div class="profile-row">
		<div class="row">
			<div class="col-1">
			<div class="profile-image block">
				<img src="{{ URL::asset('images/user/'.$the_giver -> picture) }}" alt="">
			</div>
			<div class="profile-name">
				<h2>{{ $the_user -> firstname }} {{ $the_user -> lastname }}</h2>
				<div class="block-content">			
				<p>
					@if (Auth::user() -> user_type == 'seeker' )
					<a href="{{ URL::route('message.create', array('to_id'=>$the_giver -> uid )) }}">Send a message</a>
					@endif
				</p>
				<p>{{ $the_giver -> gender }}</p>
				</div>
			</div>
			</div>
		</div>
		<div class="row">
			<div class="col-1">
			<div class="profile-contact block">
				<h2 class="block-title">Contact<a class="edit-btn" href="{{ URL::route('care_givers.edit', array('id'=>$the_user->id)) }}">Edit</a></h2>
				<div class="block-content">
					<p>Email: {{ $the_user -> email }}</p>
					<p>Phone: {{ $the_user -> phone }}</p>
					<p>Address: {{ $the_giver -> address1 }}</p>
					<p>Address: {{ $the_giver -> address2 }}</p>
					<p>Suburb: {{ $the_giver -> suburb }}</p>
					<p>State: {{ $the_giver -> state }}</p>
					<p>Postcode: {{ $the_giver -> postcode }}</p>
				</div>
			</div>
			</div>
		</div>
	
		<div class="row">
			<div class="col-1">
			<div class="block">
				<h2 class="block-title">Experiece<a class="edit-btn" href="{{ URL::route('care_givers.edit2', array('id'=>$the_user->id)) }}">Edit</a></h2>
				<div class="block-content">
				{{ $the_giver -> experience }}
				</div>
			</div>
			</div>
		</div>

		<div class="row">
			<div class="col-1">
			<div class="block">
				<h2 class="block-title">Education <a class="edit-btn" href="{{ URL::route('care_givers.edit2', array('id'=>$the_user->id)) }}">Edit</a></h2>
				<div class="block-content">
					{{ $the_giver -> education }}
				</div>
			</div>
			</div>
		</div>

		<div class="row">
			<div class="col-2">
				<div class="block">
					<h2 class="block-title">My Services  <a class="edit-btn" href="{{ URL::route('care_givers.edit3', array('id'=>$the_user->id)) }}">Edit</a></h2>
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
					<h2 class="block-title">Rate <a class="edit-btn" href="{{ URL::route('care_givers.edit2', array('id'=>$the_user->id)) }}">Edit</a></h2>
					<div class="block-content">
						Hourly Rate: ${{ $the_giver->rate}}
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-1">
				<div class="block">
					<h2 class="block-title">My Quolifications<a class="edit-btn" href="{{ URL::route('care_givers.edit3', array('id'=>$the_user->id)) }}">Edit</a></h2>
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

		<div class="row">
			<div class="col-1">
				<div class="block">
					<h2 class="block-title">My Availability<a class="edit-btn" href="{{ URL::route('care_givers.edit3', array('id'=>$the_user->id)) }}">Edit</a></h2>
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
@endsection('content')