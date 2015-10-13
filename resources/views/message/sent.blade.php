@extends('html')

@section('content')
{{ dd($sender) }}
<div class="listing-box">
	<ul>
		@foreach ($messages as $message)
			<li>
				
			</li>
		@endforeach
	</ul>
</div>
@endsection