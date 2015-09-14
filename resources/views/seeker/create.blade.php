@extends ('html')

@section ('content')

<form action="{{ URL::route('care_seekers.store')}}" method="post">
	{!! Form::token() !!}
	<input type="hidden" name="uid" value="{{ $id }}">
	<div class="form-row">
		<label for="premium">Premium</label>
		<input type="radio" name="premium" value="true">Yes
		<input type="radio" name="premium" value="false">No
	</div>
	<div class="form-row">
		<input type="submit" value="Submit">
	</div>
	
</form>
@endsection