@extends ('html')

@section ('content')

<form action="{{ URL::route('job.store') }}" method="post">
	{!! csrf_field() !!}
	<input type="hidden" value="{{$id}}" name="uid">
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
    	<label for="state">State</label>
    	<select name="state" id="state-dropdown">
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
		<input id="suburb-dropdown" type="text" name="suburb">
	</div>
	<div class="form-row">
		<label for="postcode">Postcode</label>
		<input type="text" name="postcode">
	</div>
	<div class="form-row">
		<label for="start_date">Start Date</label>
		<input type="text" name="start_date" class="datepicker">
	</div>
	<div class="form-row">
		<input type="submit" value="POST">
	</div>
</form>

@endsection