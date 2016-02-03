@extends('admin.master')


@section('content')
    
    <div class="seeker-list-block content-with-sidebar">
        <div class="tool-bar">
            
        </div>
        <div class="listing-box">
            @if (count($seekers) > 0)
            <ul>
                @foreach( $seekers as $seeker )
                    <li>
                        <div class="user-block">
                            <div class="user-img">
                                <img src="{{ URL::asset('images/user/'.$seeker->picture) }}" alt="test alt">
                            </div>
                             <div class="user-info">
                                 <div class="user-name">
                                     {{ $seeker->firstname }} {{ $seeker->lastname}}
                                 </div>
                                 <div class="user-location">
                                     {{ $seeker->suburb }},{{ $seeker->state }}
                                 </div>
                                 <div class="cta">
                                    <a class="blue-btn" href="{{ URL::route('admin.seeker.show', array('uid' => $seeker->id )) }}">View</a>
                                    <!-- <a class="dark-blue-btn" href="{{ URL::route('message.create', array('to_id'=>$seeker->id )) }}">Send a message</a> -->
                                </div>
                             </div>
                        </div>              
                    </li>
                @endforeach
            </ul>
            @else
            <ul>
                <li>
                    <div class="user-block">
                    Not care seeker found.
                    </div>
                </li>
            </ul>
            @endif
        </div>
    </div>

@endsection