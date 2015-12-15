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
			<img src="{{ URL::asset('images/user/'.$message->picture) }}" alt="">
		</div>
		<div class="message-tease">
			<div class="user-name">
				@if ($type == "to") To:&nbsp;
				@elseif ($type == "from") From:&nbsp;
				@endif
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
	@if ($type == "from" )
	<div class="msg-cta">
		<a class="dark-blue-btn" href="{{ URL::route('message.create', array('to_id' => $message->sender_id))}}">Replay</a>
	</div>
	@endif
</div>
@endsection