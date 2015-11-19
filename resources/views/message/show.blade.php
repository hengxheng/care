@extends('html')

@section('content')

<div id="message-menu">
	<ul>
		<li class="active"><a href="{{ URL::route('message.inbox') }}">Inbox</a></li>
		<li><a href="{{ URL::route('message.sent') }}">Sent</a></li>
	</ul>
</div>
<div class="message">
	<div class="message-list-block">
		<div class="user-img">
			@if($message->user_type == "giver")
				<img src="{{ URL::asset('images/user/'.$message->g_pic) }}" alt="">
			@elseif($message->user_type == "seeker")
				<img src="{{ URL::asset('images/user/'.$message->s_pic) }}" alt="">
			@endif
		</div>
		<div class="message-tease">
			<div class="user-name">
				{{ $message->firstname}} {{ $message->lastname}}
			</div>
			<div class="message-content">
				{{ $message->subject }}
			</div>
			<div class="message-date">
				{{ date('H:i w F d Y', strtotime($message->created_at)) }}
			</div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="message-body">
		{{ $message->content }}
	</div>
	<div class="msg-cta">
		<a class="dark-blue-btn" href="{{ URL::route('message.create', array('to_id' => $message->sender_id))}}">Replay</a>
	</div>
</div>
@endsection