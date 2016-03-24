@extends('admin.master')

@section('content')

<p>Total number of Care Givers signed up: {{ $m }}</p>
<p>Total number of Care Seekers signed up: {{ $n }}</p>


<p><a href="{{ URL::route('admin.givers.list') }}" class="blue-btn">View All Care Givers</a>&nbsp;&nbsp;&nbsp;
<a href="{{ URL::route('admin.seekers.list') }}" class="blue-btn">View all Care Seekers</a></p>
@endsection