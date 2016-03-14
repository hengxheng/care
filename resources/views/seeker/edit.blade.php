@extends ('html')

@section('pageType', 'edit-profile')
@endsection

@section ('content')
<div id="user-2" class="register-block">
<form action="{{ URL::route('care_seekers.update', array('id'=>$seeker->uid))}}" method="post" enctype="multipart/form-data">
	<input name="_method" type="hidden" value="PATCH">
	{!! Form::token() !!}
	<div class="form-row">
		<label for="address1">Address1</label>
		<input type="text" name="address1" value="{{ $seeker->address1 }}">
	</div>
	<div class="form-row">
		<label for="address2">Address2</label>
		<input type="text" name="address2" value="{{ $seeker->address2 }}">
	</div>
	<div class="form-row">
		<label for="state">State</label>
		<select name="state">
			<option value="{{ $seeker->state }}">{{ $seeker->state }}</option>
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
		<input type="text" name="suburb" value="{{ $seeker->suburb }}">
	</div>
	<div class="form-row">
		<label for="postcode">Postcode</label>
		<input type="text" name="postcode" value="{{ $seeker->postcode }}">
	</div>	
	<div class="form-row image">	
		<img src="{{ URL::asset('images/user/'.Auth::user()->picture) }}" alt="">
		<label for="picture">Profile Picture (Head shots only)</label>
		<input type="file" name="picture">
	</div> 
	<div class="form-row submit">
		<input type="submit" value="Update">
	</div>
</form>
</div>
@endsection