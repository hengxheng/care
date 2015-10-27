@extends('html')

@section('content')
<div id="provider-create-form" ng-controller="GiverCtrl">
	<form action="{{ URL::route('care_givers.update', array('id'=>Auth::user() -> id)) }}" method="post" enctype="multipart/form-data">
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
			<input type="text" name="state" value="{{ $giver->state }}">
		</div>
		<div class="form-row">
			<label for="suburb">Suburb</label>
			<input type="text" name="suburb" value="{{ $giver->suburb }}">
		</div>
		<div class="form-row">
			<label for="postcode">Postcode</label>
			<input type="text" name="postcode" value="{{ $giver->postcode }}">
		</div>	
		<div class="form-row">	
			<img src="{{ URL::asset('images/'.$giver -> picture) }}" alt="">
			<label for="picture">Your Photo</label>
			<input type="file" name="picture">
		</div> 
		<div class="form-row">
			<input type="submit" value="Update">
		</div>
	</form>
<div>
@endsection
