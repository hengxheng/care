@extends('html')

@section('content')
<h2>Inbox</h2>
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
				</div>
			</li>
		@endforeach
	</ul>
</div>
@endsection