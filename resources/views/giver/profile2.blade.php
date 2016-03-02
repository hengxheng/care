@extends('html')

@section('pageType', 'giver-signup')
@endsection

@section('content')
<div id="giver-profile-3" ng-controller="GiverCtrl">
<form method="POST" action="{{ URL::route('care_givers.store') }}" class="full-wide">
    {!! csrf_field() !!}
    <input type="hidden" name="uid" value="{{ Auth::user() -> id }}">
    <input type="hidden" name="step" value="3">
    <div class="row">

            <h2>Do you have experience in any of the following</h2>
            <div class="form-row service-cats">
                <div><input type="checkbox" name="service[]" value="Alzheimer's & Dementia Care"><span>Alzheimer's & Dementia Care</span></div>
                <div><input type="checkbox" name="service[]" value="Companion Care"><span>Companion Care</span></div>
                <div><input type="checkbox" name="service[]" value="Palliative Care"><span>Palliative Care</span></div>
                <div><input type="checkbox" name="service[]" value="Respite Care"><span>Respite Care</span></div>
                <div><input type="checkbox" name="service[]" value="Transition Care"><span>Transition Care</span></div>
            </div>
    </div>

    <div class="row">
            <h2>Which of the following services can you provide?</h2>
            <div class="form-row">
                <ul class="service2-list">
                    <li><input type="checkbox" name="service2[]" value="Bathing"><span>Bathing</span></li>
                    <li><input type="checkbox" name="service2[]" value="Grooming"><span>Grooming</span></li>
                    <li><input type="checkbox" name="service2[]" value="Toileting"><span>Toileting</span></li>
                    <li><input type="checkbox" name="service2[]" value="Managing Medications"><span>Managing Medications</span></li>
                    <li><input type="checkbox" name="service2[]" value="Meal prep"><span>Meal prep</span></li>
                    <li><input type="checkbox" name="service2[]" value="Groceries & Shopping"><span>Groceries & Shopping</span></li>
                    <li><input type="checkbox" name="service2[]" value="Transferring & Mobility"><span>Transferring & Mobility</span></li>
                    <li><input type="checkbox" name="service2[]" value="Exercise"><span>Exercise</span></li>
                    <li><input type="checkbox" name="service2[]" value="Transportation"><span>Transportation</span></li>
                    <li><input type="checkbox" name="service2[]" value="Housekeeping"><span>Housekeeping</span></li>
                    <li><input type="checkbox" name="service2[]" value="Companionship"><span>Companionship</span></li>
                </ul>
            </div>
    </div>

    <div class="row">
  
            <h2>Qualifications</h2>
            <div class="quolification-block">
                <div class="form-row">
                    <label>Qualification: </label><input type="text" name="quolification[]">
                </div>
            </div>
            <a id="add_quo" href="#" ng-click="add_quolification()" class="dark-blue-btn">Add More Qualification</a>

    </div>
    <div class="row">

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

            <div class="form-row" style="width:300px;">
                <input type="submit" value="Submit">
            </div>

    </div>

</form>

</div>
@endsection