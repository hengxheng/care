@extends('html')

@section('content')


<div id="provider-create-form" ng-controller="GiverCtrl">
	<form action="{{ URL::route('care_givers.update', array('id'=>Auth::user()->id)) }}" method="post" enctype="multipart/form-data">
		<input name="_method" type="hidden" value="PATCH">
		{!! Form::token() !!}
		<div class="form-row">
			<label for="gender">Gender</label>
			
			<input type="radio" name="gender" value="male" 
			@if($giver->gender == "male" ) checked @endif
			>Male
			<input type="radio" name="gender" value="female"
			@if($giver->gender == "female" ) checked @endif
			>Female
		</div>
		<div class="form-row">
			<label for="address1">Address1</label>
			<input type="text" name="address1" value="{{ $giver->address1 }}">
		</div>
		<div class="form-row">
			<label for="address2">Address2</label>
			<input type="text" name="address2" value="{{ $giver->address2 }}">
		</div>
		<div class="form-row">
			<label for="state">State</label>
			<select name="state" id="state-dropdown">
					<option value="{{ $giver->state }}">{{ $giver->state }}</option>
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
			<input type="text" value="{{ $giver->suburb }}">
		</div>
		<div class="form-row">
			<label for="postcode">Postcode</label>
			<input type="text" name="postcode" value="{{ $giver->postcode }}">
		</div>	
		<div class="form-row">	
			<img src="{{ URL::asset('images/user/'.$giver->picture) }}" alt="">
			<label for="picture">Your Photo</label>
			<input type="file" name="picture">
		</div> 
		<div class="form-row">
			<input type="submit" value="Update">
		</div>
	</form>
<div>
@endsection
