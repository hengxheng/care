@extends('html')


@section('content')
<div class="listing-box">
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
                         <div class="user-exp">
                             {{ str_limit($giver->experience, 200) }}
                         </div>
                         <div class="user-rate">
                             Rate: ${{ $giver->rate }}
                         </div>
                         <div class="cta">
                            <a class="blue-btn" href="{{ URL::route('care_givers.show', array('uid' => $giver->id )) }}">View</a>
                            <a class="dark-blue-btn" href="{{ URL::route('message.create', array('to_id'=>$giver->id )) }}">Send a message</a>
                        </div>
                     </div>
                     
                </div>
               
                
                
                
            </li>
        @endforeach
    </ul>
</div>
@endsection