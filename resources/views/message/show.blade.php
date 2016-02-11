@extends('html')

@section('pageType', 'sent-messages')
@endsection
@section('content')

<div id="message-menu">
	<ul>
		<li class="active"><a href="{{ URL::route('message.inbox') }}">Inbox</a></li>
		<li><a href="{{ URL::route('message.sent') }}">Sent</a></li>
	</ul>
</div>
<div class="message">
	<div class="message-list-block">
		<aside class="contact">
			<div class="user-img">
				<img src="{{ URL::asset('images/user/'.$message->picture) }}" alt="">
			</div>

			<div class="message-tease">
			<div class="user-name">
				@if ($type == "to") <span>To:</span>
				@elseif ($type == "from") <span>From:</span>
				@endif
				<h2>{{ $message->firstname}} {{ $message->lastname}}</h2>
			</div>
			<div class="message-content">
				<p><span>Subject</span> {{ $message->subject }}</p>
			</div>
			<div class="message-date">
				<span class="time"><i class="fa fa-clock-o"></i>{{ date('H:i', strtotime($message->created_at)) }}</span>
				<span class="date"><i class="fa fa-calendar"></i>{{ date('jS F Y', strtotime($message->created_at)) }}</span>
			</div>
		</div>
		</aside>
	</div>
	<div class="message-body">
		<p>{!! html_entity_decode($message->content) !!}</p>
	</div>
	@if ($type == "from" )
	<div class="msg-cta">
		<a class="dark-blue-btn" href="{{ URL::route('message.create', array('to_id' => $message->sender_id))}}">Reply</a>
	</div>
	@endif
</div>
<div class="row">
	<div class="col-1">
		<a class="dark-blue-btn" href="{{ URL::previous() }}">Back</a>
	</div>
</div>
@endsection