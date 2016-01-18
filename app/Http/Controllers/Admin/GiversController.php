<?php

namespace App\Http\Controllers\admin;

use App\Giver;
use App\User;
use App\Job;
use App\Service;
use App\Service2;
use App\Quolification;
use App\Availability;
use App\Rating;
use Auth;
use Input;
use Redirect;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GiversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $the_user = User::find($id);
        $the_giver = Giver::find($id);
        $my_services = Service::MyServices($id);
        $my_services2 = Service2::MyServices($id);
        $my_quolifications = Quolification::MyQuolifications($id);
        $av = Availability::MyAvailability($id);
        $my_rating = Rating::MyRating($id);
        $my_availability = array();
        foreach ($av as $a){
            $my_availability[$a->week][$a->time] = $a->av; 
        }

        return view('admin.giver.show', compact(array(
            'the_user',
            'the_giver',
            'my_services',
            'my_services2',
            'my_quolifications',
            'my_availability',
            'my_rating'
            )));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function listing(){

        $givers = Giver::getAllGivers();
        return view('admin.giver.list',compact('givers'));
    }
}
