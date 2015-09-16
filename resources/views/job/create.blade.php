@extends ('html')

@section ('content')

<form action="{{ URL::route('job.store') }}" method="post">
	{!! csrf_field() !!}
	<input type="hidden" value="{{ $id }}" name="uid">
	<div class="form-row">
		<textarea name="description"></textarea>
	</div>
	<div class="form-row">
		<input type="submit" value="POST">
	</div>
</form>

@endsection