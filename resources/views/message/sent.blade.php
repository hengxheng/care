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
					<div>
						<div class="user-name">
							From:  {{ $message->firstname}} {{ $message->lastname}}
						</div>
						<div class="message-content">
							{{ str_limit($message->content, 100) }}
						</div>
						<div class="message-date">
							Date: {{ $message->created_at }}
						</div>
						<div class="cta">
							<a class="dark-blue-btn" href="{{ URL::route('message.showInbox', array('id' => $message->id ))}}">View</a>
						</div>
					</div>
				</li>
			@endforeach
		</ul>
	</div>
</div>
@endsection