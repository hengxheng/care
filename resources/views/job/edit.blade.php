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
		<label for="title">Status</label>
		<select name="status">
			<option value="{{ $job->status }}">{{ $job->status }}</option>
			<option value="Active">Active</option>
			<option value="Close">Close</option>
		</select>
	</div>
	<div class="form-row">
		<input type="submit" value="UPDATE">
	</div>
</form>

@endsection