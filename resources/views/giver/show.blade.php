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

		<div class="block">
			<h2 class="block-title">My Availability</h2>
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
                    <td>{{ $my_availability['mon']['morning'] }} </td>
                    <td>{{ $my_availability['tue']['morning'] }}</td>
                    <td>{{ $my_availability['wed']['morning'] }}</td>
                    <td>{{ $my_availability['thu']['morning'] }}</td>
                    <td>{{ $my_availability['fri']['morning'] }}</td>
                    <td>{{ $my_availability['sat']['morning'] }}</td>
                    <td>{{ $my_availability['sun']['morning'] }}</td>
                </tr>
                <tr>
                    <td>Afternoon</td>
                    <td>{{ $my_availability['mon']['afternoon'] }}</td>
                    <td>{{ $my_availability['tue']['afternoon'] }}</td>
                    <td>{{ $my_availability['wed']['afternoon'] }}</td>
                    <td>{{ $my_availability['thu']['afternoon'] }}</td>
                    <td>{{ $my_availability['fri']['afternoon'] }}</td>
                    <td>{{ $my_availability['sat']['afternoon'] }}</td>
                    <td>{{ $my_availability['sun']['afternoon'] }}</td>
                </tr>
                <tr>
                    <td>Everning</td>
                    <td>{{ $my_availability['mon']['everning'] }}</td>
                    <td>{{ $my_availability['tue']['everning'] }}</td>
                    <td>{{ $my_availability['wed']['everning'] }}</td>
                    <td>{{ $my_availability['thu']['everning'] }}</td>
                    <td>{{ $my_availability['fri']['everning'] }}</td>
                    <td>{{ $my_availability['sat']['everning'] }}</td>
                    <td>{{ $my_availability['sun']['everning'] }}</td>
                </tr>
                <tr>
                    <td>Overnight</td>
                    <td>{{ $my_availability['mon']['overnight'] }}</td>
                    <td>{{ $my_availability['tue']['overnight'] }}</td>
                    <td>{{ $my_availability['wed']['overnight'] }}</td>
                    <td>{{ $my_availability['thu']['overnight'] }}</td>
                    <td>{{ $my_availability['fri']['overnight'] }}</td>
                    <td>{{ $my_availability['sat']['overnight'] }}</td>
                    <td>{{ $my_availability['sun']['overnight'] }}</td>
                </tr>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection('content')