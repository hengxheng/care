@extends ('html')

@section ('content')

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
		<input type="text" name="suburb" value="{{ $seeker->suburb }}">
	</div>
	<div class="form-row">
		<label for="postcode">Postcode</label>
		<input type="text" name="postcode" value="{{ $seeker->postcode }}">
	</div>	
	<div class="form-row">	
		<img src="{{ URL::asset('images/user/'.$seeker->picture) }}" alt="">
		<label for="picture">Profile Picture</label>
		<input type="file" name="picture">
	</div> 
	<div class="form-row">
		<input type="submit" value="Submit">
	</div>
	
</form>
@endsection