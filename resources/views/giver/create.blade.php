@extends('html')


@section('content')
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
						<input type="text" name="address1" required>
					</div>
					<div class="form-row">
						<label for="address2">Address2</label>
						<input type="text" name="address2">
					</div>
					<div class="form-row">
						<label for="state">State</label>
						<select id="state-dropdown" name="state" required>
							<option value="New South Wales">New South Wales</option>
		                    <option value="Queensland">Queensland</option>
		                    <option value="Northern Territory">Northern Territory</option>
		                    <option value="Australian Capital Territory">Australian Capital Territory</option>
		                    <option value="Victoria">Victoria</option>
		                    <option value="Western Australia">Western Australia</option>
		                    <option value="South Australia">South Australia</option>
		                    <option value="Tasmania">Tasmania</option>
						</select>
					</div>
					<div class="form-row">
						<label for="suburb">Suburb</label>
						<input id="suburb-dropdown" type="text" name="suburb" required>
					</div>
					<div class="form-row">
						<label for="postcode">Postcode</label>
						<input type="text" name="postcode" required pattern="[0-9]{4}">
					</div>	
					<div class="form-row">	
						<label for="picture">Your Photo</label>
						<input type="file" name="picture">
					</div>
					<div class="form-row">
						<label for="background-check">Background Check</label>
						<input type="file" name="background-check">
						<p>It is mandatory to have a background check in order for your profile to be live.</p>
						<p>To apply, please visit <a href="https://www.veritascheck.com.au/apply" target="_blank">https://www.veritascheck.com.au/apply</a></p>
					</div>
					<div class="form-row">
						<input type="submit" value="Save">
					</div>
				</form>
			</div>
@endsection