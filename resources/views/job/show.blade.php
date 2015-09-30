@extends ('html')
@section ('content')
	<div class="job-view">
		<div class="job-title block-title">
			{{ $job -> title }}
		</div>
		<div class="job-description block-content">
			{{ $job -> description }}
		</div>
		<div class="job-status">
			{{ $job -> status }}
		</div>
		<div class="job-time">
			{{ $job -> created_at }}
		</div>
		<div class="job-action">
			<a href="{{ URL::route('job.edit', array('id' => $job -> id))}}">Edit</a>
			<a href="{{ URL::route('job.delete', array('id' => $job->id )) }}">Delete</a>
		</div>
	</div>
@endsection