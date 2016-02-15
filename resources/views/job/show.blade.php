@extends ('html')
@section ('content')
	<div class="job-view">
		<div class="job-title block">
			<div class="block-content">		
				<h2>{{ $job->title }} <span>{{ $job->status }}</span></h2>
			</div>	
		</div>

		<div class="block start-date">
			<h2 class="block-title">Date Created</h2>
			<div class="block-content">
				<p>{{ $job->created_at }}</p>
			</div>
		</div>

		<div class="block start-date">
			<h2 class="block-title">Start Date</h2>
			<div class="block-content">
				<p>{{ $job->start_date}}</p>
			</div>
		</div>

		<div class="block service-type">
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
		<div class="block location">
			<h2 class="block-title">Location</h2>
			<div class="block-content">
				<p>{{ $job->suburb }}, {{ $job->state }}</p>
			</div>
		</div>
		<div class="job-description block">
			<h2 class="block-title">Job Description</h2>
			<div class="block-content">
				<p>{{ $job->description }}</p>
			</div>
		</div>
		@if (Auth::user()->id == $job->poster_id)
		<div class="job-action">
			<a class="blue-btn" href="{{ URL::route('job.edit', array('id' => $job -> id))}}">Edit</a>
			<a class="dark-blue-btn" href="{{ URL::route('job.delete', array('id' => $job->id )) }}">Delete</a>
		</div>
		@endif
		@if (Auth::user()->user_type == "giver" && !$applied)
		<div class="job-action">
			<a href="{{ URL::route('submission.create', array('jid' => $job->id, 'uid'=> Auth::user()->id)) }}" class="blue-btn">APPLY VIA MESSAGE</a>
		</div>
		@endif
	</div>


	<div class="sub-list block">
		<h2>Job Submissions</h2>
		<ul>
			@foreach ($submissions as $s)
			 <li>
			 	<div class="sub-block">
	                <div class="user-block">
	                    <div class="user-img">
	                        <img src="{{ URL::asset('images/user/'.$s->picture) }}" alt="">
	                    </div>
                     	<div class="user-info">
							<div class="user-name">
						 		{{ $s->firstname }} {{ $s->lastname}}
							</div>     
							<div class="user-location">
					     		<p>{{ $s->suburb }},{{ $s->state }}</p>
							</div>       
							<div class="sub-date">
								<p>Submitted on: {{ $s->created_at }}</p>
							</div>    
							<div class="sub-content">
								<h2>Description:</h2>
								<p>{{ $s->content }}</p>
							</div>	
							@if(Auth::user()->id != $s->uid)					 
							<div class="cta">
	                            <a class="blue-btn" href="{{ URL::route('care_givers.show', array('uid' => $s->uid )) }}">View Profile</a>
	                            <a class="dark-blue-btn" href="{{ URL::route('message.create', array('to_id'=>$s->uid )) }}">Send a message</a>
	                        </div>
	                        @endif
	                     </div>
	                </div>  
	                
				</div>	          
            </li>
			@endforeach
		</ul>
	</div>
	<div class="row">
		<div class="col-1">
			<a class="dark-blue-btn" href="{{ URL::previous() }}">Back</a>
		</div>
	</div>
@endsection