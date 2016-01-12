@extends('html')

@section('content')

<div class="register-block">
    <a href="{{ URL::route('giver_register') }}" class="blue-btn">I want to provide care</a>
    <a href="{{ URL::route('seeker_register') }}" class="blue-btn">I'm looking for care</a>
</div>

@endsection