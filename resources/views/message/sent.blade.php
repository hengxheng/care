@extends('html')

@section('content')
<div id="message-menu">
	<ul>
		<li><a href="{{ URL::route('message.inbox') }}">Inbox</a></li>
		<li class="active"><a href="{{ URL::route('message.sent') }}">Sent</a></li>
	</ul>
</div>

<div id="message-main">
	<div class="message-listing-box">
		<ul>
			@foreach ($messages as $message)
				<li>
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
								{{ str_limit($message->content, 100) }}
							</div>
							<div class="message-date">
								{{ date('H:i w F d Y', strtotime($message->created_at)) }}
							</div>
							<div class="cta">
								<a class="dark-blue-btn" href="{{ URL::route('message.showInbox', array('id' => $message->id ))}}">View</a>
							</div>
						</div>
					</div>
				</li>
			@endforeach
		</ul>
	</div>
</div>
@endsection