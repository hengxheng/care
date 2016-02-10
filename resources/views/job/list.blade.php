@extends('html')
@section('content')
<div class="page-title">
    <h2>Jobs</h2>
</div>
<div class="listing-box">
 @if ( !$jobs->count() )
        You have no posted jobs.
    @else
        <ul>
            @foreach( $jobs as $job )
            <li>
            	<div class="job-block">
                    <div class="job-content">
                        <div class="job-title">
                    	   <h3>{{ $job -> title }}</h3>
                        </div>
                        
                        <span class="job-state {{ str_slug($job->status) }}">{{ $job->status }}</span>

                        <div class="job-desc">
                    	   
                           <p>{{ str_limit($job -> description, 400) }}</p>
                           
                        </div>
                    
                        <div class="job-action">
                            <a class="blue-btn view" href="{{ URL::route('job.show', array('id' => $job->id )) }}">View</a>
                            @if ($job->poster_id == Auth::user()->id)
                            <a class="blue-btn edit" href="{{ URL::route('job.edit', array('id' => $job->id )) }}">Edit</a>
                    	    <a class="dark-blue-btn delete" href="{{ URL::route('job.delete', array('id' => $job->id )) }}">Delete</a>
                            @endif
                        </div>
                    </div>

                    <div class="job-snapshot">

                        <span>Start Date</span>
                        <p><i class="fa fa-calendar"></i> {{ $job->start_date}}</p>

                        <span>Created at</span>
                        <p><i class="fa fa-clock-o"></i> {{ $job->created_at }}</p>

                        <span>Location</span>
                        <p><i class="fa fa-map-marker"></i> {{ $job->suburb }}, {{ $job->state }}</p>
                        
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    @endif
</div>
<div class="pagination-block">
    {!! $jobs->render() !!}
</div>
@endsection