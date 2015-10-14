@extends('message.message_html')

@section('message_content')
<div class="message block">
	<div class="msg-form">{{ $msg -> firstname }} {{ $msg -> lastname }}</div>
	<div class="msg-title"></div>
	<div class="msg-content">{{ $msg -> content }}</div>
	<div class="msg-date">{{ $msg -> created_at }}</div>
	<div class="msg-cta">
		<a href="{{ URL::route('message.create', array('to_id'=>$msg -> sender_id))}}">Replay</a>
	</div>
</div>
@endsection