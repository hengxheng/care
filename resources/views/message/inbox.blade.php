@extends('html')

@section('content')
<div id="message-menu">
	<ul>
		<li class="active"><a href="{{ URL::route('message.inbox') }}">Inbox</a></li>
		<li><a href="{{ URL::route('message.sent') }}">Sent</a></li>
	</ul>
</div>
<div id="message-main">
	<div class="message-listing-box">
		<ul>
			@foreach ($messages as $message)
				<li>
					<div class="message-list-block">
						<div class="user-img">
							<img src="{{ URL::asset('images/user/'.$message->picture) }}" alt="">
						</div>
						<div class="message-tease">
							<div class="user-name">
								From:  {{ $message->firstname}} {{ $message->lastname}}
							</div>
							<div class="message-content">
								{{ str_limit($message->content, 100) }}
							</div>
							<div class="message-date">
								{{ date('H:i D F d, Y', strtotime($message->created_at)) }}
							</div>
							<div class="cta">
								<a class="dark-blue-btn" href="{{ URL::route('message.show', array('type' => 'from','id' => $message->id ))}}">View</a>
							</div>
						</div>
					</div>
				</li>
			@endforeach
		</ul>
	</div>
	<div class="pagination-block">
	    {!! $messages->render() !!}
	</div>
</div>
@endsection