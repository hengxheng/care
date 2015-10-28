@extends ('html')

@section ('content')

<form action="{{ URL::route('job.store') }}" method="post">
	{!! csrf_field() !!}
	<input type="hidden" value="{{ $id }}" name="uid">
	<div class="form-row">
		<label for="title">Title</label>
		<input type="text" name="title">
	</div>
	<div class="form-row">
		<label for="description">Description</label>
		<textarea name="description"></textarea>
	</div>
    <div class="form-row">
        <label for="service[]">Service</label>
        <div><input type="checkbox" name="service[]" value="Meal preparation"><span>Meal preparation</span></div>
        <div><input type="checkbox" name="service[]" value="Alzheimer's Care"><span>Alzheimer's Care</span></div>
        <div><input type="checkbox" name="service[]" value="Companionship"><span>Companionship</span></div>
        <div><input type="checkbox" name="service[]" value="Housekeeping"><span>Housekeeping</span></div>
        <div><input type="checkbox" name="service[]" value="Transportation"><span>Transportation</span></div>
        <div><input type="checkbox" name="service[]" value="Personal Care"><span>Personal Care</span></div>
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
		<input type="submit" value="POST">
	</div>
</form>

@endsection