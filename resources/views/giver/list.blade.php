@extends('html')


@section('content')
<div class="listing-box">
    {{-- dd($givers)--}}
    <ul>
        @foreach( $givers as $giver )
            <li>
                {{{ $giver -> firstname }}} {{ $giver->lastname}}
                <div class="cta">
                    <a href="{{ URL::route('care_givers.show', array('uid' => $giver->id )) }}">View</a>
                    <a href="{{ URL::route('message.create', array('to_id'=>$giver->id )) }}">Send a message</a>
                </div>
            </li>
        @endforeach
    </ul>
</div>
@endsection