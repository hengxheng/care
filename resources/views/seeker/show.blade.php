@extends ('html')
@section ('content')
	@if($the_user->user_type == "seeker")
	<div class="seeker-profile">
	<div class="s-name">{{ $the_user->firstname }} {{ $the_user->lastname }}</div>
	<div class="s-email">{{ $the_user->email }}</div>
	<div class="s-phone">{{ $the_user->phone }}</div>
	<div>Premium: {{ $the_seeker->premium }}</div>	
	</div>

	<a class="btn" href="{{ URL::route('job.create', array('uid' => $the_user->id)) }}">Post a job</a>
	@endif
@endsection