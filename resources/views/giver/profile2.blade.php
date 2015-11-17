@extends('html')

@section('content')
<div id="giver-profile-3" ng-controller="GiverCtrl">
<form method="POST" action="{{ URL::route('care_givers.store') }}" class="full-wide">
    {!! csrf_field() !!}
    <input type="hidden" name="uid" value="{{ Auth::user() -> id }}">
    <input type="hidden" name="step" value="3">
    <div class="row">
         <div class="col-1">
            <h2>Services</h2>
            <div class="form-row">
                <div><input type="checkbox" name="service[]" value="Meal preparation"><span>Meal preparation</span></div>
                <div><input type="checkbox" name="service[]" value="Alzheimer's Care"><span>Alzheimer's Care</span></div>
                <div><input type="checkbox" name="service[]" value="Companionship"><span>Companionship</span></div>
                <div><input type="checkbox" name="service[]" value="Housekeeping"><span>Housekeeping</span></div>
                <div><input type="checkbox" name="service[]" value="Transportation"><span>Transportation</span></div>
                <div><input type="checkbox" name="service[]" value="Personal Care"><span>Personal Care</span></div>
            </div>
         </div>
    </div>

    <div class="row">
        <div class="col-1">
            <h2>Quolifications</h2>
            <div class="quolification-block">
                <div class="form-row">
                    <label>Qualification: </label><input type="text" name="quolification[]">
                </div>
            </div>
            <a id="add_quo" href="#" ng-click="add_quolification()" class="dark-blue-btn">Add a quolification</a>
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
                        <input type="hidden" name="avai[morning][mon]" value="0">
                    </td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[morning][tue]" value="0">
                    </td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[morning][wed]" value="0">
                    </td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[morning][thu]" value="0">
                    </td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[morning][fri]" value="0">
                    </td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[morning][sat]" value="0">
                    </td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[morning][sun]" value="0">
                    </td>
                </tr>
                <tr>
                    <td>Afternoon</td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[afternoon][mon]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[afternoon][tue]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[afternoon][wed]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[afternoon][thu]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[afternoon][fri]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[afternoon][sat]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[afternoon][sun]" value="0"></td>
                </tr>
                <tr>
                    <td>Everning</td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[everning][mon]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[everning][tue]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[everning][wed]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[everning][thu]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[everning][fri]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[everning][sat]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[everning][sun]" value="0"></td>

                </tr>
                <tr>
                    <td>Overnight</td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[overnight][mon]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[overnight][tue]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[overnight][wed]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[overnight][thu]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[overnight][fri]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[overnight][sat]" value="0"></td>
                    <td><a href="#" class="av-tick"></a>
                        <input type="hidden" name="avai[overnight][sun]" value="0"></td>
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