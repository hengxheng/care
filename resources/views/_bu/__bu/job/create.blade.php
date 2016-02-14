@extends ('html')
@section('pageType', 'post-a-job')
@endsection
@section ('content')
<div class="page-title">
    <h2>Post a job</h2>
</div>
<div class="block">
<form action="{{ URL::route('job.store') }}" method="post">
	{!! csrf_field() !!}
	<input type="hidden" value="{{$id}}" name="uid">
    <div class="half first">
	<div class="form-row title">
		<label for="title">Title</label>
		<input placeholder="Title of your job" type="text" name="title">
	</div>
	<div class="form-row desc">
		<label for="description">Description</label>
		<textarea placeholder="Tell us about the job you have to offer, please remeber to be as detailed as possible as you are more likely to get a response." name="description"></textarea>
	</div>
    </div>
    
    <div class="half second">
    <div class="form-row service">
        <label for="service[]">Service</label>
        <div><input type="checkbox" name="service[]" value="Meal preparation"><span>Meal preparation</span></div>
        <div><input type="checkbox" name="service[]" value="Alzheimer's Care"><span>Alzheimer's Care</span></div>
        <div><input type="checkbox" name="service[]" value="Companionship"><span>Companionship</span></div>
        <div><input type="checkbox" name="service[]" value="Housekeeping"><span>Housekeeping</span></div>
        <div><input type="checkbox" name="service[]" value="Transportation"><span>Transportation</span></div>
        <div><input type="checkbox" name="service[]" value="Personal Care"><span>Personal Care</span></div>
    </div>
    <div class="form-row state">
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
    <div class="form-row suburb">
		<label for="suburb">Suburb</label>
		<input id="suburb-dropdown" type="text" name="suburb">
	</div>
	<div class="form-row postcode">
		<label for="postcode">Postcode</label>
		<input type="text" name="postcode">
	</div>
	<div class="form-row start">
		<label for="start_date">Start Date</label>
		<input type="text" name="start_date" class="datepicker">
	</div>
	<div class="form-row">
		<input type="submit" value="Post this Job">
	</div>
    </div>
</form>
</div>
@endsection