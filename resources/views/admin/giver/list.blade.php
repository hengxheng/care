@extends('admin.master')


@section('content')
    
    <div class="giver-list-block">
<!--         <div class="tool-bar">
            <form id="sort-form" action="{{ URL::route('care_givers.list')}}" method="get">
                <label for="sort-by">Sort By: </label>
                <select name="sort-by" id="sort-by">
                    <option value="{{ $order }}">
                        @if($order == "avg") Rating
                        @else {{ $order }}
                        @endif
                    </option>
                    <option value="avg">Rating</option>
                    <option value="rate">Rate</option>
                </select>
            </form>
            <script>
                $(function(){
                    $("#sort-by").change(function(){
                        $("#sort-form").submit();
                    });
                });
            </script>
        </div> -->
        <div class="listing-box">
            @if (count($givers) > 0)
            <ul>
                @foreach( $givers as $giver )
                    <li class="{{ $giver->state }} {{ $giver->suburb }} rate-{{ $giver->rate }} rating-{{$rating[$giver->uid] }}">
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
                                    <a class="blue-btn" href="{{ URL::route('admin.giver.show', array('uid' => $giver->id )) }}">View</a>
                                    <!-- <a class="dark-blue-btn" href="{{ URL::route('message.create', array('to_id'=>$giver->id )) }}">Send a message</a> -->
                                </div>
                                <div class="user-rating">
                                    <div class="rating">
                                        @if($rating[$giver->id] >0 )
                                            @for ($i=0; $i< $rating[$giver->id]; $i++)
                                                <i class="fa fa-star fa-2x"></i>
                                            @endfor
                                        @else
                                           Not Rating yet
                                        @endif
                                    </div>
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
    </div>

  <!--   <div class="filter-sidebar">
        <h2>Refine Search:</h2>

        <div class="filters">
            <form action="{{ URL::route('care_givers.list')}}">
                {!! csrf_field() !!}
                <div class="form-ele">
                    <label for="state-filter">State:</label>
                    <select name="state-filter" id="state-filter">
                        @if ($state_filter != "null")
                        <option value="{{ $state_filter }}">{{ $state_filter }}</option>
                        @endif
                        <option value="null">-- NONE --</option>
                        <option value="NSW">NSW</option>
                        <option value="ACT">ACT</option>
                        <option value="NSW">NSW</option>
                        <option value="NT">NT</option>
                        <option value="QLD">QLD</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="VIC">VIC</option>
                        <option value="WA">WA</option>
                    </select>
                </div>
                
                <div class="form-ele">
                    <label for="suburb-filter">Suburb:</label>
                    <select name="suburb-filter" id="suburb-filter">
                        @if ($suburb_filter != "null")
                        <option value="{{ $suburb_filter }}">{{ $suburb_filter }}</option>
                        @endif
                        <option value="null">-- NONE --</option>
                        @foreach ($suburbs as $sub)
                            <option value="{{ $sub->suburb }}">{{ $sub->suburb }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-ele">
                    <label for="rating">Rating:</label>
                    <select name="rating-filter" id="rating-filter">
                        @if ($rating_filter != "null")
                        <option value="{{ $rating_filter }}">{{ $rating_filter }}</option>
                        @endif
                        <option value="null">-- NONE --</option>
                        <option value="0 - 1">0 - 1</option>
                        <option value="1 - 2">1 - 2</option>
                        <option value="2 - 3">2 - 3</option>
                        <option value="3 - 4">3 - 4</option>
                        <option value="4 - 5">4 - 5</option>
                    </select>
                </div>

                <div class="form-ele">
                    <label for="price-filter">Price:</label>
                    <select name="price-filter" id="price-filter">
                        @if ($price_filter != "null")
                        <option value="{{ $price_filter }}">
                            @if( $price_filter == '$0 - $25')
                            Under $25
                            @elseif ( $price_filter == '$150 - $100000')
                            Above $150
                            @else
                            {{ $price_filter }}
                            @endif
                        </option>
                        @endif
                        <option value="null">-- NONE --</option>
                        <option value="$0 - $25">Under $25</option>
                        <option value="$25 - $50">$25 - $50</option>
                        <option value="$50 - $100">$50 - $100</option>
                        <option value="$100 - $150">$100 - $150</option>
                        <option value="$150 - $100000">Above $150</option>
                    </select>
                </div>

                <div class="form-ele">
                    <input type="submit" value="FILTER" />
                </div>
            </form>
        </div>
    </div> -->
@endsection