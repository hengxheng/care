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
use App\Suburb;
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
        // filters

        $state_filter = (Session::has('state-filter'))?(Session::get('state-filter')):"null";
        $suburb_filter = (Session::has('suburb-filter'))?(Session::get('suburb-filter')):"null";
        $rating_filter = (Session::has('rating-filter'))?(Session::get('rating-filter')):"null";
        $price_filter = (Session::has('price-filter'))?(Session::get('price-filter')):"null";

        //sort by

        $order = (Session::has('giver-order'))?(Session::get('giver-order')):"avg";

        if(Input::has('state-filter')){
            Session::put('state-filter', Input::get('state-filter'));
            $state_filter = Input::get('state-filter');
        }
        if(Input::has('suburb-filter')){
            Session::put('suburb-filter', Input::get('suburb-filter'));
            $suburb_filter = Input::get('suburb-filter');
        }
        if(Input::has('rating-filter')){
            Session::put('rating-filter', Input::get('rating-filter'));
            $rating_filter = Input::get('rating-filter');
        }
        if(Input::has('price-filter')){
            Session::put('price-filter', Input::get('price-filter'));
            $price_filter = Input::get('price-filter');
        }

        if($price_filter != 'null'){
            $t = explode(' - ', $price_filter);
            $min_price = substr($t[0],1);
            $max_price = substr($t[1],1);
        }
        else{
            $min_price = 'null';
            $max_price = 'null';
        }

        if($rating_filter != 'null'){
            $x = explode(' - ', $rating_filter);
            $min_rating = $x[0];
            $max_rating = $x[1];
            var_dump($min_rating);
        }
        else{
            $min_rating = 'null';
            $max_rating = 'null';
        }

        if(Input::has('sort-by')){
            Session::put('giver-order', Input::get('sort-by'));
            $order = Input::get('sort-by');
        }

        $givers = Giver::filterAllGivers($state_filter, $suburb_filter, $min_price, $max_price, $min_rating, $max_rating, $order, "Inactive");

        foreach ($givers as $g){
            $rating[$g->uid] = Rating::MyRating($g->uid);
        }

        $suburbs = Giver::getAllSuburbs();
        return view('admin.giver.list',compact('givers', 'rating', 'suburbs','state_filter', 'suburb_filter','rating_filter', 'price_filter','order'));
    }
}
