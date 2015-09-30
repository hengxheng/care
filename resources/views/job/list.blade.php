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
                    	{{ $job -> title }}
                    </div>
                    <div class="job-desc">
                    	{{ $job -> description }}
                    </div>
                    <div class="job-status">
                    	{{ $job -> status }}
                    </div>
                    <div class="job-action">
                    	<a href="{{ URL::route('job.edit', array('id' => $job->id )) }}">Edit</a>
                    	<a href="{{ URL::route('job.delete', array('id' => $job->id )) }}">Delete</a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection