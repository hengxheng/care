@extends('html')

@section('content')

<h2>Welcome to Care Nation</h2>
 @if(Auth::check())
	@if( Auth::user() -> status == "Inactive")
		@if (Auth::user() -> user_type == "giver")
			<div id="provider-create-form" ng-controller="GiverCtrl">
				<form action="{{ URL::route('care_givers.store') }}" method="post" enctype="multipart/form-data">
					<input type="hidden" name="uid" value="{{ Auth::user() -> id }}">
					<input type="hidden" name="step" value="1">
					{!! Form::token() !!}
					<div class="form-row">
						<label for="gender">Gender</label>
						<input type="radio" name="gender" value="male" checked>Male
						<input type="radio" name="gender" value="female">Female
					</div>
					<div class="form-row">
						<label for="address1">Address1</label>
						<input type="text" name="address1">
					</div>
					<div class="form-row">
						<label for="address2">Address2</label>
						<input type="text" name="address2">
					</div>
					<div class="form-row">
						<label for="state">State</label>
						<select name="state">
								<option value="ACT">ACT</option>
								<option value="NSW">NSW</option>
								<option value="NT">NT</option>
								<option value="QLD">QLD</option>
								<option value="SA">SA</option>
								<option value="TAS">TAS</option>
								<option value="VIC">VIC</option>
								<option value="WA">WA</option>
						</select>
					</div>
					<div class="form-row">
						<label for="suburb">Suburb</label>
						<input type="text" name="suburb">
					</div>
					<div class="form-row">
						<label for="postcode">Postcode</label>
						<input type="text" name="postcode">
					</div>	
					<div class="form-row">	
						<label for="picture">Your Photo</label>
						<input type="file" name="picture">
					</div> 
					<div class="form-row">
						<input type="submit" value="Save">
					</div>
				</form>
			</div>

		@elseif (Auth::user() -> user_type == "seeker")
 			<form action="{{ URL::route('care_seekers.store')}}" method="post" enctype="multipart/form-data">
				{!! Form::token() !!}
				<input type="hidden" name="uid" value="{{ Auth::user() -> id }}">
				<div class="form-row">
					<label for="address1">Address1</label>
					<input type="text" name="address1">
				</div>
				<div class="form-row">
					<label for="address2">Address2</label>
					<input type="text" name="address2">
				</div>
				<div class="form-row">
					<label for="state">State</label>
					<select name="state">
						<option value="ACT">ACT</option>
						<option value="NSW">NSW</option>
						<option value="NT">NT</option>
						<option value="QLD">QLD</option>
						<option value="SA">SA</option>
						<option value="TAS">TAS</option>
						<option value="VIC">VIC</option>
						<option value="WA">WA</option>
				</select>
				</div>
				<div class="form-row">
					<label for="suburb">Suburb</label>
					<input type="text" name="suburb">
				</div>
				<div class="form-row">
					<label for="postcode">Postcode</label>
					<input type="text" name="postcode">
				</div>	
				<div class="form-row">	
					<label for="picture">Your Photo</label>
					<input type="file" name="picture">
				</div> 
				<div class="form-row">
					<input type="submit" value="Submit">
				</div>
				
			</form>
		@endif
	@else
         Dashboard

	@endif
@endif
@endsection