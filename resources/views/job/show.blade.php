@extends ('html')
@section ('content')
	<div class="job-view">
		<div class="job-title block">
			<h2 class="block-title">Job Title ({{ $job->status }})</h2>
			
			<div class="block-content">		
				<h2>{{ $job->title }}</h2>
				<p>{{ $job->created_at }}</p>
			</div>	
		</div>
		<div class="job-description block">
			<h2 class="block-title">Job Description</h2>
			<div class="block-content">
				{{ $job->description }}
			</div>
		</div>
		<div class="block">
			<h2 class="block-title">Start Date</h2>
			<div class="block-content">
				{{ $job->start_date}}
			</div>
		</div>
		<div class="block">
			<h2 class="block-title">Service Type</h2>
			<div class="block-content">
				<ul class="service-list">
					@foreach ($serv as $s)
					<li>
						<div class="{{ str_slug($s, '-') }} service-icon">
						{{ $s }}
						</div>
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="block">
			<h2 class="block-title">Location</h2>
			<div class="block-content">
				<p>{{ $job->suburb }}, {{ $job->state }}</p>
			</div>
		</div>
		@if (Auth::user()->id == $job->poster_id)
		<div class="job-action">
			<a class="blue-btn" href="{{ URL::route('job.edit', array('id' => $job -> id))}}">Edit</a>
			<a class="dark-blue-btn" href="{{ URL::route('job.delete', array('id' => $job->id )) }}">Delete</a>
		</div>
		@endif
		@if (Auth::user()->user_type == "giver")
		<div class="job-action">
			<a href="{{ URL::route('submission.create', array('jid' => $job->id, 'uid'=> Auth::user()->id)) }}" class="blue-btn">Apply this job</a>
		</div>
		@endif
	</div>
@endsection