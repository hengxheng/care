@extends('html')

@section('content')

<div class="register-block">
    <h2>Find Care For Your Family Today!</h2>
    <p>Get started by posting your care needs.</p>
    <a href="{{ URL::route('seeker_register') }}" class="blue-btn">I'm looking for care</a>
</div>

<div class="register-block">
	<h2>Apply for Caregiver Jobs</h2>
	<p>Connect with those seeking care</p>
	<a href="{{ URL::route('giver_register') }}" class="blue-btn">I want to provide care</a>
</div>
@endsection