@extends('message.message_html')

@section('message_content')
<h2>Sent</h2>
<div class="listing-box">
	<ul>
		@foreach ($messages as $message)
			<li>
				<div>
					<p>From:  {{ $message -> firstname}} {{ $message -> lastname}}</p>
					<div>
						{{ $message -> content }}
					</div>
					<p>Date: {{ $message -> created_at }}</p>
					<div class="cta">
						<a href="{{ URL::route('message.showInbox', array('id' => $message->id ))}}">View</a>
					</div>
				</div>
			</li>
		@endforeach
	</ul>
</div>
@endsection