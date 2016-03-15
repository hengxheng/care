@extends('html')

@section('content')
<div class="messaging-create form-container">
	<form action="{{ URL::route('message.store') }}" method="post">
	<input type="hidden" name="from_id" value="{{ Auth::user()->id }}">
	<input type="hidden" name="to_id" value="{{ $to_user->id }}">
	{!! Form::token() !!}
	<div class="form-row">
		<h2>New message to: {{ $to_user->firstname}} {{ $to_user->lastname}}</h2>
	</div>
	<div class="form-row">
		<label for="subject">Subject</label>
		<input type="text" name="subject">
	</div>
	<div class="form-row">
		<label for="content">Message: </label>
		<textarea name="content" style="height: 200px;"></textarea>
	</div>
	<div class="form-row">
		<input type="submit" value="Send"> <a class="dark-blue-btn" href="{{ URL::previous() }}" style="margin-left: 10px;">Cancel</a>
	</div>
</form>
</div>
@endsection