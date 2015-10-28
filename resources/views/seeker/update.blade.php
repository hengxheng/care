@extends ('html')

@section ('content')

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
					<input type="text" name="state">
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
@endsection