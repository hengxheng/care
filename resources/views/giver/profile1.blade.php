@extends('html')

@section('content')
<form method="POST" action="{{ URL::route('care_givers.store') }}">
    {!! csrf_field() !!}
    <input type="hidden" name="uid" value="{{ Auth::user() -> id }}">
    <input type="hidden" name="step" value="2">
    <div class="form-row">
        <label for="bio">Describt yourself</label>
        <textarea name="bio"></textarea>
    </div>
    <div class="form-row">
        <label for="live_in">Live In</label>
        <input type="checkbox" name="live_in" value="1">
    </div>
    <div class="form-row">
        <label for="years_exp">Years of Experience</label>
        <input type="text" name="years_exp" placeholder="How many years experience?" pattern="[0-9]{1,2}">
    </div>
    <div class="form-row">
        <label for="experience">Experience</label>
        <textarea name="experience"></textarea>
    </div>

    <div class="form-row">
        <label for="education">Education</label>
        <textarea name="education"></textarea>
    </div>

    <div class="form-row">
        <label for="rate">Rate</label>
        <input type="text" name="rate" placeholder="$$/hour" pattern="[0-9]{1,4}"> 
    </div>

    <div class="form-row">
        <input type="submit" value="Save">
    </div>
</form>

@endsection