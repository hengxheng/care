@extends ('html')

@section ('content')
<form action="{{ URL::route('job.update', array('id' => $job->id )) }}" method="post">
	{!! csrf_field() !!}
	<input name="_method" type="hidden" value="PATCH">
	<div class="form-row">
		<label for="title">Title</label>
		<input type="text" name="title" value="{{ $job->title }}">
	</div>
	<div class="form-row">
		<label for="description">Description</label>
		<textarea name="description">{{ $job->description }}</textarea>
	</div>
	
	<div class="form-row">
		<label for="service[]">Service</label>
        <div><input type="checkbox" name="service[]" value="Meal preparation"
		@if ($services["Meal preparation"]) checked @endif
        	><span>Meal preparation</span></div>
        <div><input type="checkbox" name="service[]" value="Alzheimer's Care"
		@if ($services["Alzheimer's Care"]) checked @endif
        	><span>Alzheimer's Care</span></div>
        <div><input type="checkbox" name="service[]" value="Companionship"
		@if ($services["Companionship"]) checked @endif
        	><span>Companionship</span></div>
        <div><input type="checkbox" name="service[]" value="Housekeeping"
		@if ($services["Housekeeping"]) checked @endif
        	><span>Housekeeping</span></div>
        <div><input type="checkbox" name="service[]" value="Transportation"
		@if ($services["Transportation"]) checked @endif
        	><span>Transportation</span></div>
        <div><input type="checkbox" name="service[]" value="Personal Care"
		@if ($services["Personal Care"]) checked @endif
        	><span>Personal Care</span></div>
	</div>
	<div class="form-row">
		<label for="start_date">Start Date</label>
		<input type="text" name="start_date" value="{{ $job->start_date}}" class="datepicker">
	</div>

	<div class="form-row">
		<label for="state">State</label>
		<select name="state">
    		<option value="{{ $job->state }}">{{ $job->state }}</option>
    		<option value="New South Wales">New South Wales</option>
    		<option value="Queensland">Queensland</option>
    		<option value="Victoria">Victoria</option>
    		<option value="Western Australia">Western Australia</option>
    		<option value="South Australia">South Australia</option>
    		<option value="Tasmania">Tasmania</option>
    	</select>
	</div>
	
	<div class="form-row">
		<label for="suburb">Suburb</label>
		<input type="text" name="suburb" value="{{ $job->suburb }}">
	</div>
	@if (Auth::user()->id == $job->poster_id || Auth::user()->user_type == "admin")
	<div class="form-row">
		<label for="title">Status</label>
		<select name="status">
			<option value="{{ $job->status }}">{{ $job->status }}</option>
			<option value="Active">Active</option>
			<option value="Closed">Closed</option>
		</select>
	</div>
	@endif
	<div class="form-row">
		<input type="submit" value="UPDATE">
	</div>
</form>

@endsection