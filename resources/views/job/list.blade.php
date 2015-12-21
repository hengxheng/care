@extends('html')


@section('content')
<div class="listing-box">
 @if ( !$jobs->count() )
        You have not posted any job yet.
    @else
        <ul>
            @foreach( $jobs as $job )
            <li>
            	<div class="job-block">
                    <div class="job-title">
                    	{{ $job -> title }} (<span class="{{ str_slug($job->status) }}">{{ $job->status }}</span>)
                    </div>
                    <div class="job-desc">
                    	{{ $job -> description }}
                    </div>
                    <div class="job-status">
                    	
                    </div>
                    <div class="job-action">
                        <a class="blue-btn" href="{{ URL::route('job.show', array('id' => $job->id )) }}">View</a>
                    	{{ dd($job)}}
                        <a class="blue-btn" href="{{ URL::route('job.edit', array('id' => $job->id )) }}">Edit</a>
                    	<a class="dark-blue-btn" href="{{ URL::route('job.delete', array('id' => $job->id )) }}">Delete</a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection