@extends('html')

@section('content')
{{-- dd($the_giver) --}}
<div class="giver-profile-block">
{{ $the_giver -> gender}}
</div>
@endsection('content')