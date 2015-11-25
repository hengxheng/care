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
                
                <div><input type="checkbox" name="service[]" value="Alzheimer's & Dementia Care"
                @if (isset($ser["Alzheimer's & Dementia Care"])) checked @endif
                    ><span>Alzheimer's & Dementia Care</span></div>

                <div><input type="checkbox" name="service[]" value="Companion Care"
                @if (isset($ser["Companion Care"])) checked @endif
                    ><span>Companion Care</span></div>

                <div><input type="checkbox" name="service[]" value="Palliative Care"
                @if (isset($ser["Palliative Care"])) checked @endif
                    ><span>Palliative Care</span></div>

                <div><input type="checkbox" name="service[]" value="Respite Care"
                @if (isset($ser["Respite Care"])) checked @endif
                    ><span>Respite Care</span></div>

                <div><input type="checkbox" name="service[]" value="Transition Care"
                @if (isset($ser["Transition Care"])) checked @endif
                    ><span>Transition Care</span></div>
            </div>
         </div>
    </div>
    
    <div class="row">
        <div class="col-1">
            <h2>Services</h2>
            <div class="form-row">
                <ul class="service2-list">
                    <li><input type="checkbox" name="service2[]" value="Bathing"
                        @if (isset($ser2["Bathing"])) checked @endif
                        ><span>Bathing</span></li>
                    <li><input type="checkbox" name="service2[]" value="Grooming"
                        @if (isset($ser2["Grooming"])) checked @endif
                        ><span>Grooming</span></li>
                    <li><input type="checkbox" name="service2[]" value="Toileting"
                        @if (isset($ser2["Toileting"])) checked @endif
                        ><span>Toileting</span></li>
                    <li><input type="checkbox" name="service2[]" value="Managing Medications"
                        @if (isset($ser2["Managing Medications"])) checked @endif
                        ><span>Managing Medications</span></li>
                    <li><input type="checkbox" name="service2[]" value="Meal prep"
                        @if (isset($ser2["Meal prep"])) checked @endif
                        ><span>Meal prep</span></li>
                    <li><input type="checkbox" name="service2[]" value="Groceries & Shopping"
                        @if (isset($ser2["Groceries & Shopping"])) checked @endif
                        ><span>Groceries & Shopping</span></li>
                    <li><input type="checkbox" name="service2[]" value="Transferring & Mobility"
                        @if (isset($ser2["Transferring & Mobility"])) checked @endif
                        ><span>Transferring & Mobility</span></li>
                    <li><input type="checkbox" name="service2[]" value="Exercise"
                        @if (isset($ser2["Exercise"])) checked @endif
                        ><span>Exercise</span></li>
                    <li><input type="checkbox" name="service2[]" value="Transportation"
                        @if (isset($ser2["Transportation"])) checked @endif
                        ><span>Transportation</span></li>
                    <li><input type="checkbox" name="service2[]" value="Housekeeping"
                        @if (isset($ser2["Housekeeping"])) checked @endif
                        ><span>Housekeeping</span></li>
                    <li><input type="checkbox" name="service2[]" value="Companionship"
                        @if (isset($ser2["Companionship"])) checked @endif
                        ><span>Companionship</span></li>
                </ul>
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
        <div class="col-1">
        <h2>Availability</h2>
        <div class="availability-block">
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
    </div>
    <div class="row">
        <div class="col-1">
            <div class="form-row" style="width:300px;">
                <input type="submit" value="Submit">
            </div>
        </div>
    </div>
</form>
</div>

@endsection