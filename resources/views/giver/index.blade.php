 
<div class="listing-box">
 @if ( !$givers->count() )
        You have no givers
    @else
        <ul>
            @foreach( $givers as $giver )
                <li>
                    {{{ $giver -> uid }}}
                </li>
            @endforeach
        </ul>
    @endif
</div>