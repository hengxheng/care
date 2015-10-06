@extends('html')

@section('content')
<div class="messaging-create form-container">
	<form action="{{ URL::route('message.store') }}" method="post">
	<input type="hidden" name="from_id" value="{{ Auth::user()->id }}">
	<input type="hidden" name="to_id" value="{{ $to_user->id }}">
	{!! Form::token() !!}
	<div>
		TO: {{ $to_user->firstname}} {{ $to_user->lastname}}
	</div>
	<div class="form-row">
		<label for="content">Message: </label>
		<textarea name="content"></textarea>
	</div>
	<div class="form-row">
		<input type="submit" value="Send">
	</div>
</form>
</div>
@endsection