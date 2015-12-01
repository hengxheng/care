@extends('admin.master')

@section('content')
<div class="listing-box">
    <h2>Givers</h2>
    @if (count($givers) > 0)
    <ul>
        @foreach( $givers as $giver )
            <li>
                <div class="user-block">
                    <div class="user-img">
                        <img src="{{ URL::asset('images/user/'.$giver->picture) }}" alt="">
                    </div>
                     <div class="user-info">
                         <div class="user-name">
                             {{ $giver->firstname }} {{ $giver->lastname}}
                         </div>
                         <div class="user-location">
                             {{ $giver->suburb }},{{ $giver->state }}
                         </div>
                         <div class="user-exp">
                             {{ str_limit($giver->bio, 200) }}
                         </div>
                         <div class="cta">
                            <a class="blue-btn" href="{{ URL::route('care_givers.show', array('uid' => $giver->id )) }}">View</a>
                            <a class="dark-blue-btn" href="{{ URL::route('message.create', array('to_id'=>$giver->id )) }}">Send a message</a>
                        </div>
                     </div>
                     <div class="user-right-box">
                        <div class="user-rate">
                            <h2>${{ $giver->rate }}</h2>
                            <p>per hour</p>
                        </div>
                        <div class="year-exp">
                            <h2>{{ $giver->years_exp }}</h2>
                            <p>years<br/>experience</p>
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
            Not care giver found.
            </div>
        </li>
    </ul>
    @endif
</div>

<div class="listing-box">
    <h2>Seekers</h2>
    @if (count($seekers) > 0)
    <ul>
        @foreach( $seekers as $seeker )
            <li class="{{ $seeker->state }} {{ $seeker->suburb }}">
                <div class="user-block">
                    <div class="user-img">
                        <img src="{{ URL::asset('images/user/'.$seeker->picture) }}" alt="">
                    </div>
                     <div class="user-info">
                         <div class="user-name">
                             {{ $seeker->firstname }} {{ $seeker->lastname}}
                         </div>
                         <div class="user-location">
                             {{ $seeker->suburb }},{{ $seeker->state }}
                         </div>
                         <div class="cta">
                          <!--   <a class="blue-btn" href="{{ URL::route('care_givers.show', array('uid' => $giver->id )) }}">View</a>
                            <a class="dark-blue-btn" href="{{ URL::route('message.create', array('to_id'=>$giver->id )) }}">Send a message</a> -->
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

@endsection