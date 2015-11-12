@extends('html')

@section('content')
<div class="message">
	<div class="user-name">From: <br/>{{ $msg -> firstname }} {{ $msg -> lastname }}</div>
	<div class="message-date">Date: <br/>{{ $msg -> created_at }}</div>
	<div class="message-content">Content: <br/>{{ $msg -> content }}</div>
	<div class="msg-cta">
		<a class="dark-blue-btn" href="{{ URL::route('message.create', array('to_id'=>$msg -> sender_id))}}">Replay</a>
	</div>
</div>
@endsection