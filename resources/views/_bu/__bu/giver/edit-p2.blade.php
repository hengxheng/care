@extends('html')

@section('content')
<form action="{{ URL::route('care_givers.update', array('id'=>Auth::user() -> id)) }}" method="post">
        <input name="_method" type="hidden" value="PATCH">
    {!! csrf_field() !!}
    <div class="form-row">
        <label for="bio">Descript yourself</label>
        <textarea name="bio">{{ $giver->bio }}</textarea>
    </div>
    <div class="form-row">
        <label for="live_in">Live In</label>
        @if($giver->live_in)
        <input type="checkbox" name="live_x" value="1" checked="checked" >
        @else
        <input type="checkbox" name="live_x" value="1">
        @endif
        <input type="hidden" name="live_in" value="{{ $giver->live_in }}">

        <script>
        jQuery(function($){
            $('input[name="live_x"]').change(function(){
                if(this.checked){
                    $('input[name="live_in"]').val("1");
                }
                else{
                    $('input[name="live_in"]').val("0");
                }
                
            });
        });
        </script>
    </div>
    <div class="form-row">
        <label for="years_exp">Years of Experience</label>
        <input type="text" name="years_exp" value="{{ $giver->years_exp }}" patter="[0-9]{2}">
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
        <input type="text" name="rate" value="{{ $giver->rate }}" patter="[0-9]{4}" required> 
    </div>

    <div class="form-row">
        <input type="submit" value="Save">
    </div>
</form>

@endsection