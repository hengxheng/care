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
    <div class="form-row" style="width:300px;">
        <input type="submit" value="Submit">
    </div>
</form>
</div>
@endsection