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
		@if ( !$messages->count() )
			<h3>There are no messages in your inbox!</h3>
		@else
		<ul>
			@foreach ($messages as $message)
				<li>
					<div class="message-list-block">
						<div class="user-img">
							<img src="{{ URL::asset('images/user/'.$message->picture) }}" alt="">
						</div>
						<div class="message-tease">
							<div class="user-name">
								<span>From:</span>  <h2>{{ $message->firstname}} {{ $message->lastname}}</h2>
							</div>
							<div class="message-date">
								<span class="time"><i class="fa fa-clock-o"></i>{{ date('H:i', strtotime($message->created_at)) }}</span>
								<span class="date"><i class="fa fa-calendar"></i>{{ date('jS F Y', strtotime($message->created_at)) }}</span>
							</div>
							<div class="clear"></div>
							<div class="message-content">
								{{ $message->subject }}
							</div>
							
							<div class="cta">
								<a class="dark-blue-btn" href="{{ URL::route('message.show', array('type' => 'from','id' => $message->id ))}}"><i class="fa fa-envelope-o"></i>View Message</a>
							</div>
						</div>
					</div>
				</li>
			@endforeach
		</ul>
		@endif
	</div>
	<div class="pagination-block">
	    {!! $messages->render() !!}
	</div>
</div>
@endsection