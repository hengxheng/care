@extends('html')

@section('content')
<form action="{{ URL::route('care_givers.update', array('id'=>Auth::user() -> id)) }}" method="post">
        <input name="_method" type="hidden" value="PATCH">
    {!! csrf_field() !!}
    <div class="form-row">
        <label for="years_exp">Years of Experience</label>
        <input type="text" name="years_exp" value="{{ $giver->years_exp }}">
    </div>
    <div class="form-row">
        <label for="experience">Experience</label>
        <textarea name="experience">{{ $giver->experience }}</textarea>
    </div>
    
    <div class="form-row">
        <label for="education">Education</label>
        <textarea name="education">{{ $giver->education }}</textarea>
    </div>

    <div class="form-row">
        <label for="rate">Rate</label>
        <input type="text" name="rate" value="{{ $giver->rate }}"> 
    </div>

    <div class="form-row">
        <input type="submit" value="Save">
    </div>
</form>

@endsection