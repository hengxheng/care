@extends('html')


@section('content')
    <div class="filter-sidebar">
        <h2>Refine Search:</h2>

        <div class="filters">
            <form action="{{ URL::route('care_givers.list')}}">
                {!! csrf_field() !!}
                <div class="form-ele">
                    <label for="gender">Gender</label>
                    <select name="gender-filter">
                        <option value="null">-- NONE --</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="form-ele">
                    <label for="postcode-filter">Postcode: </label>
                    <input type="text" name="postcode-filter" 
                    @if( $postcode_filter != " ")
                    value="{{ $postcode_filter }}"
                    @endif
                    >
                </div>
                <div class="form-ele">
                    <label for="radius">Radius (Km)</label>
                    <select name="radius-filter">
                        <option value="{{ $radius_filter }}">{{ $radius_filter }}</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                    </select>
                </div>           

           <!--      <div class="form-ele">
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
                </div> -->


                <div class="form-ele">
                    <label for="service-filter[]">Service Categories</label>
                    <div><input type="checkbox" name="service-filter[]" value="Alzheimer's & Dementia Care"
                        @if( isset($sf["Alzheimer's & Dementia Care"]) && $sf["Alzheimer's & Dementia Care"]) checked @endif
                        ><span>Alzheimer's & Dementia Care</span></div>

                    <div><input type="checkbox" name="service-filter[]" value="Companion Care"
                        @if( isset($sf["Companion Care"]) && $sf["Companion Care"]) checked @endif
                        ><span>Companion Care</span></div>

                    <div><input type="checkbox" name="service-filter[]" value="Palliative Care"
                        @if( isset($sf["Palliative Care"]) && $sf["Palliative Care"]) checked @endif
                        ><span>Palliative Care</span></div>

                    <div><input type="checkbox" name="service-filter[]" value="Respite Care"
                        @if( isset($sf["Respite Care"]) && $sf["Respite Care"]) checked @endif
                        ><span>Respite Care</span></div>

                    <div><input type="checkbox" name="service-filter[]" value="Transition Care"
                        @if( isset($sf["Transition Care"]) && $sf["Transition Care"]) checked @endif
                        ><span>Transition Care</span></div>
                </div>
                
                <div class="form-ele">
                    <label for="service2-filter[]">Services</label>
                    <div><input type="checkbox" name="service2-filter[]" value="Bathing"
                        @if( isset($sf2["Bathing"]) && $sf2["Bathing"]) checked @endif
                        ><span>Bathing</span></div>

                     <div><input type="checkbox" name="service2-filter[]" value="Grooming"
                        @if( isset($sf2["Grooming"]) && $sf2["Grooming"]) checked @endif
                        ><span>Grooming</span></div>

                        <div><input type="checkbox" name="service2-filter[]" value="Toileting"
                        @if( isset($sf2["Toileting"]) && $sf2["Toileting"]) checked @endif
                            ><span>Toileting</span></div>

                        <div><input type="checkbox" name="service2-filter[]" value="Managing Medications"
                        @if( isset($sf2["Managing Medications"]) && $sf2["Managing Medications"]) checked @endif
                            ><span>Managing Medications</span></div>

                        <div><input type="checkbox" name="service2-filter[]" value="Meal prep"
                        @if( isset($sf2["Meal prep"]) && $sf2["Meal prep"]) checked @endif
                            ><span>Meal prep</span></div>

                        <div><input type="checkbox" name="service2-filter[]" value="Groceries & Shopping"
                        @if( isset($sf2["Groceries & Shopping"]) && $sf2["Groceries & Shopping"]) checked @endif
                            ><span>Groceries & Shopping</span></div>

                        <div><input type="checkbox" name="service2-filter[]" value="Transferring & Mobility"
                        @if( isset($sf2["Transferring & Mobility"]) && $sf2["Transferring & Mobility"]) checked @endif
                            ><span>Transferring & Mobility</span></div>

                        <div><input type="checkbox" name="service2-filter[]" value="Exercise"
                        @if( isset($sf2["Exercise"]) && $sf2["Exercise"]) checked @endif
                            ><span>Exercise</span></div>

                        <div><input type="checkbox" name="service2-filter[]" value="Transportation"
                        @if( isset($sf2["Transportation"]) && $sf2["Transportation"]) checked @endif
                            ><span>Transportation</span></div>

                        <div><input type="checkbox" name="service2-filter[]" value="Housekeeping"
                        @if( isset($sf2["Housekeeping"]) && $sf2["Housekeeping"]) checked @endif
                            ><span>Housekeeping</span></div>

                        <div><input type="checkbox" name="service2-filter[]" value="Companionship"
                        @if( isset($sf2["Companionship"]) && $sf2["Companionship"]) checked @endif
                            ><span>Companionship</span></div>
                </div>
                <div class="form-ele">
                    <input type="submit" value="FILTER" />
                </div>
            </form>
        </div>
    </div>

    <div class="giver-list-block content-with-sidebar">
        <div class="tool-bar row">
            <div class="col-1">
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
            </div>
        </div>
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
                                    <a class="blue-btn" href="{{ URL::route('care_givers.show', array('uid' => $giver->id )) }}">View</a>
                                    <a class="dark-blue-btn" href="{{ URL::route('message.create', array('to_id'=>$giver->id )) }}">Send a message</a>
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
        <div class="pagination-block">
            {!! $givers->render() !!}
        </div>
    </div>
@endsection