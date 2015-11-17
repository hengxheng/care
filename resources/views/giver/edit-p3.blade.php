@extends('html')

@section('content')
<div id="giver-profile-3" ng-controller="GiverCtrl">
<form method="POST" action="{{ URL::route('care_givers.update', array('id' => Auth::user()->id)) }}" class="full-wide">
    {!! csrf_field() !!}
    <input name="_method" type="hidden" value="PATCH">
    <div class="row">
         <div class="col-1">
            <h2>Services</h2>
            <div class="form-row">
                
                <div><input type="checkbox" name="service[]" value="Meal preparation"
                @if (isset($ser["Meal preparation"])) checked @endif
                    ><span>Meal preparation</span></div>

                <div><input type="checkbox" name="service[]" value="Alzheimer's Care"
                @if (isset($ser["Alzheimer's Care"])) checked @endif
                    ><span>Alzheimer's Care</span></div>

                <div><input type="checkbox" name="service[]" value="Companionship"
                @if (isset($ser["Companionship"])) checked @endif
                    ><span>Companionship</span></div>

                <div><input type="checkbox" name="service[]" value="Housekeeping"
                @if (isset($ser["Housekeeping"])) checked @endif
                    ><span>Housekeeping</span></div>

                <div><input type="checkbox" name="service[]" value="Transportation"
                @if (isset($ser["Transportation"])) checked @endif
                    ><span>Transportation</span></div>

                <div><input type="checkbox" name="service[]" value="Personal Care"
                @if (isset($ser["Personal Care"])) checked @endif
                    ><span>Personal Care</span></div>
            </div>
         </div>
    </div>

    <div class="row">
        <div class="col-1">
            <h2>Qualifications</h2>
            <div class="quolification-block">
                @foreach ($quolifications as $q)
                    <div class="form-row">
                    <label>Qualification: </label><input type="text" name="quolification[]" value="{{ $q->quolification_name }}">
                </div>
                @endforeach
            </div>
            <a id="add_quo" href="#" ng-click="add_quolification()" class="dark-blue-btn">Add a qualification</a>
        </div>
    </div>

     <div class="row">
        <div class="availability-block">
            <label for="availability">Availability</label>
            <table id="avaiability-table">
                <tr>
                    <td></td>
                    <td>Mon</td>
                    <td>Tue</td>
                    <td>Wed</td>
                    <td>Thu</td>
                    <td>Fri</td>
                    <td>Sat</td>
                    <td>Sun</td>
                </tr>
                <tr>
                    <td>Morning</td>
                    <td>
                        <a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[morning][mon]" value="{{ $avai['morning']['mon'] }}">
                    </td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[morning][tue]" value="{{ $avai['morning']['tue'] }}">
                    </td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[morning][wed]" value="{{ $avai['morning']['wed'] }}">
                    </td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[morning][thu]" value="{{ $avai['morning']['thu'] }}">
                    </td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[morning][fri]" value="{{ $avai['morning']['fri'] }}">
                    </td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[morning][sat]" value="{{ $avai['morning']['sat'] }}">
                    </td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[morning][sun]" value="{{ $avai['morning']['sun'] }}">
                    </td>
                </tr>
                <tr>
                    <td>Afternoon</td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[afternoon][mon]" value="{{ $avai['afternoon']['mon'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[afternoon][tue]" value="{{ $avai['afternoon']['tue'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[afternoon][wed]" value="{{ $avai['afternoon']['wed']}}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[afternoon][thu]" value="{{ $avai['afternoon']['thu'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[afternoon][fri]" value="{{ $avai['afternoon']['fri'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[afternoon][sat]" value="{{ $avai['afternoon']['sat'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[afternoon][sun]" value="{{ $avai['afternoon']['sun'] }}"></td>
                </tr>
                <tr>
                    <td>Everning</td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[everning][mon]" value="{{ $avai['everning']['mon'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[everning][tue]" value="{{ $avai['everning']['tue'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[everning][wed]" value="{{ $avai['everning']['wed'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[everning][thu]" value="{{ $avai['everning']['thu'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[everning][fri]" value="{{ $avai['everning']['fri'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[everning][sat]" value="{{ $avai['everning']['sat'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[everning][sun]" value="{{ $avai['everning']['sun'] }}"></td>

                </tr>
                <tr>
                    <td>Overnight</td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[overnight][mon]" value="{{ $avai['overnight']['mon'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[overnight][tue]" value="{{ $avai['overnight']['tue'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[overnight][wed]" value="{{ $avai['overnight']['wed'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[overnight][thu]" value="{{ $avai['overnight']['thu'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[overnight][fri]" value="{{ $avai['overnight']['fri'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[overnight][sat]" value="{{ $avai['overnight']['sat'] }}"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[overnight][sun]" value="{{ $avai['overnight']['sun'] }}"></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="form-row" style="width:300px;">
        <input type="submit" value="Submit">
    </div>
</form>
</div>

@endsection