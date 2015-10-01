@extends ('html')

@section ('content')

<form action="{{ URL::route('submission.store') }}" method="post">
	{!! csrf_field() !!}
	<input type="hidden" value="{{ $jid }}" name = "jid">
	<input type="hidden" value="{{ $uid }}" name = "uid">

	<div class="form-row">
		<label for="description">Comments</label>
		<textarea name="content"></textarea>
	</div>
	<div class="form-row">
		<input type="submit" value="Apply">
	</div>
</form>

@endsection