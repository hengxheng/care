@extends('html')


@section('content')
<div id="message-sidebar">
	<ul>
		<li><a href="{{ URL::route('message.inbox') }}">Inbox</a></li>
		<li><a href="{{ URL::route('message.sent') }}">Sent</a></li>
	</ul>
</div>
<div id="message-main">
@yield('message_content')
</div>

@endsection