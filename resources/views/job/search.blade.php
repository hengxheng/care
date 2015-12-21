@extends('html')

@section('content')
<div class="filter-sidebar">
    <h2>Refine Search:</h2>
    <div class="filters">
        <form action="{{ URL::route('job.search')}}">
            {!! csrf_field() !!}
            <div class="form-ele">
                <label for="job-state-filter">State:</label>
                <select name="job-state-filter" id="state-filter">
                    @if ($state_filter != "null")
                    <option value="{{ $state_filter }}">{{ $state_filter }}</option>
                    @endif
                    <option value="null">-- NONE --</option>
                    <option value="New South Wales">New South Wales</option>
                    <option value="Queensland">Queensland</option>
                    <option value="Northern Territory">Northern Territory</option>
                    <option value="Australian Capital Territory">Australian Capital Territory</option>
                    <option value="Victoria">Victoria</option>
                    <option value="Western Australia">Western Australia</option>
                    <option value="South Australia">South Australia</option>
                    <option value="Tasmania">Tasmania</option>
                </select>
            </div>

            <div class="form-ele">
                <label for="job-suburb-filter">Suburb:</label>
                <select name="job-suburb-filter" id="suburb-filter">
                    @if ($suburb_filter != "null")
                    <option value="{{ $suburb_filter }}">{{ $suburb_filter }}</option>
                    @endif
                    <option value="null">-- NONE --</option>
                    @foreach ($suburbs as $sub)
                        <option value="{{ $sub->suburb }}">{{ $sub->suburb }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-ele">
                <label for="job-services-filter">Services:</label>
                <div><input type="checkbox" name="job-services-filter[]" value="Meal preparation"
                    @if ($serv["Meal preparation"]) checked @endif
                    ><span>Meal preparation</span></div>
                <div><input type="checkbox" name="job-services-filter[]" value="Alzheimer's Care"
                    @if ($serv["Alzheimer's Care"]) checked @endif
                    ><span>Alzheimer's Care</span></div>
                <div><input type="checkbox" name="job-services-filter[]" value="Companionship"
                    @if ($serv["Companionship"]) checked @endif
                    ><span>Companionship</span></div>
                <div><input type="checkbox" name="job-services-filter[]" value="Housekeeping"
                    @if ($serv["Housekeeping"]) checked @endif
                    ><span>Housekeeping</span></div>
                <div><input type="checkbox" name="job-services-filter[]" value="Transportation"
                    @if ($serv["Transportation"]) checked @endif
                    ><span>Transportation</span></div>
                <div><input type="checkbox" name="job-services-filter[]" value="Personal Care"
                    @if ($serv["Personal Care"]) checked @endif
                    ><span>Personal Care</span></div>
            </div>

            <div class="form-ele">
                <input type="submit" value="FILTER" />
            </div>
        </form>
    </div>
</div>

<div class="content-with-sidebar">
    <div class="tool-bar row">
        <div class="col-1">
        <form id="sort-form" action="{{ URL::route('care_givers.list')}}" method="get">
            <label for="sort-by">Sort By: </label>
            <select name="sort-by" id="sort-by">
                <option value="{{ $order }}">{{ $order }}</option>
                <option value="start_date">Start Date</option>
            </select>
        </form>
        <script>
            $(function(){
                $("#sort-by").change(function(){
                    $("#sort-form").submit();
                });
            });
        </script>
        </div>
    </div>
    <div class="listing-box">
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
                <div class="job-action">
                    <a class="blue-btn" href="{{ URL::route('job.show', array('id' => $job->id )) }}">View</a>
                    @if(Auth::user()->id == $job->poster_id)
                    <a class="blue-btn" href="{{ URL::route('job.edit', array('id' => $job->id )) }}">Edit</a>
                    <a class="dark-blue-btn" href="{{ URL::route('job.delete', array('id' => $job->id )) }}">Delete</a>
                    @endif
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    </div>
</div>
@endsection