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
			<label for="address1">Address line 1</label>
			<input type="text" name="address1" value="{{ $giver->address1 }}" required>
		</div>
		<div class="form-row">
			<label for="address2">Address line 2</label>
			<input type="text" name="address2" value="{{ $giver->address2 }}">
		</div>
		<div class="form-row">
			<label for="state">State</label>
			<select name="state" id="state-dropdown" required>
					<option value="{{ $giver->state }}">{{ $giver->state }}</option>
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
			<input id="suburb-dropdown" type="text" name="suburb" value="{{ $giver->suburb }}" required>
		</div>
		<div class="form-row">
			<label for="postcode">Postcode</label>
			<input type="text" name="postcode" value="{{ $giver->postcode }}" required>
		</div>	
		<div class="form-row">	
			<img src="{{ URL::asset('images/user/'.$giver->picture) }}" alt="">
			<label for="picture">Profile Picture (Head shots only)</label>
			<input type="file" name="picture">
		</div> 
		<div class="form-row">
			<input type="submit" value="Update">
		</div>
	</form>
</div>

@endsection
