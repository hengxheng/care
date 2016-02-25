@extends ('html')

@section('pageType', 'seeker-signup')
@endsection

@section ('content')
<div id="provider-create-form" ng-controller="GiverCtrl" class="register-block">
<form action="{{ URL::route('care_seekers.store')}}" method="post" enctype="multipart/form-data">
	{!! Form::token() !!}
	<input type="hidden" name="uid" value="{{ Auth::user() -> id }}">
	<div class="form-row">
		<label for="address1">Address line 1</label>
		<input type="text" name="address1" required>
	</div>
	<div class="form-row">
		<label for="address2">Address line 2</label>
		<input type="text" name="address2">
	</div>
	<div class="form-row">
		<label for="state">State</label>
		<select id="state-dropdown" name="state" required>
			<option value="">---</option>
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
		<label for="picture">Profile Picture (Head shots only)</label>
		<input type="file" name="picture">
	</div> 
	<div class="form-row">
		<input type="submit" value="Submit">
	</div>
	
</form>
	</div>
@endsection