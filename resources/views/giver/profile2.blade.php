@extends('html')

@section('content')
<div id="giver-profile-3" ng-controller="GiverCtrl">
<form method="POST" action="{{ URL::route('care_givers.store') }}" class="full-wide">
    {!! csrf_field() !!}
    <input type="hidden" name="uid" value="{{ Auth::user() -> id }}">
    <input type="hidden" name="step" value="3">
    <div class="row">
        <div class="col-2">
            <h2>Skills</h2>
            <div class="service-block">
                <div class="form-row">
                    <label>Service 1: </label><input type="text" name="service[]">
                </div> 
            </div>
            <a href="#" ng-click="add_service()" class="dark-blue-btn">Add a service</a>
        </div>
        <div class="col-2">
            <h2>Quolifications</h2>
            <div class="quolification-block">
                <div class="form-row">
                    <label>Quolification 1: </label><input type="text" name="quolification[]">
                </div>
            </div>
            <a href="#" ng-click="add_quolification()" class="dark-blue-btn">Add a quolification</a>
        </div>
    </div>

    <div class="row">
        <div class="availability-block">
            <label for="availability">Availability</label>
            <table>
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
                    <td><input type="checkbox" name="morning[]" value="Mon"></td>
                    <td><input type="checkbox" name="morning[]" value="Tue"></td>
                    <td><input type="checkbox" name="morning[]" value="Wed"></td>
                    <td><input type="checkbox" name="morning[]" value="Thu"></td>
                    <td><input type="checkbox" name="morning[]" value="Fri"></td>
                    <td><input type="checkbox" name="morning[]" value="Sat"></td>
                    <td><input type="checkbox" name="morning[]" value="Sun"></td>
                </tr>
                <tr>
                    <td>Afternoon</td>
                    <td><input type="checkbox" name="afternoon[]" value="Mon"></td>
                    <td><input type="checkbox" name="afternoon[]" value="Tue"></td>
                    <td><input type="checkbox" name="afternoon[]" value="Wed"></td>
                    <td><input type="checkbox" name="afternoon[]" value="Thu"></td>
                    <td><input type="checkbox" name="afternoon[]" value="Fri"></td>
                    <td><input type="checkbox" name="afternoon[]" value="Sat"></td>
                    <td><input type="checkbox" name="afternoon[]" value="Sun"></td>
                </tr>
                <tr>
                    <td>Everning</td>
                    <td><input type="checkbox" name="everning[]" value="Mon"></td>
                    <td><input type="checkbox" name="everning[]" value="Tue"></td>
                    <td><input type="checkbox" name="everning[]" value="Wed"></td>
                    <td><input type="checkbox" name="everning[]" value="Thu"></td>
                    <td><input type="checkbox" name="everning[]" value="Fri"></td>
                    <td><input type="checkbox" name="everning[]" value="Sat"></td>
                    <td><input type="checkbox" name="everning[]" value="Sun"></td>
                </tr>
                <tr>
                    <td>Overnight</td>
                    <td><input type="checkbox" name="overnight[]" value="Mon"></td>
                    <td><input type="checkbox" name="overnight[]" value="Tue"></td>
                    <td><input type="checkbox" name="overnight[]" value="Wed"></td>
                    <td><input type="checkbox" name="overnight[]" value="Thu"></td>
                    <td><input type="checkbox" name="overnight[]" value="Fri"></td>
                    <td><input type="checkbox" name="overnight[]" value="Sat"></td>
                    <td><input type="checkbox" name="overnight[]" value="Sun"></td>
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