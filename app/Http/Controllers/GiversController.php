<?php

namespace App\Http\Controllers;

use App\Giver;
use App\User;
use App\Job;
use App\Service;
use App\Service2;
use App\Quolification;
use App\Availability;
use App\Rating;
use App\Suburb;
use App\Location;
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
        $user = Auth::user();

        $submited_jobs = Job::getSubmitedJob($user->id);
        return view('giver.index', compact('submited_jobs'));
    }

    public function listing(){
        // filters

        // var_dump(Input::get('service-filter'));
        // var_dump(Input::get('service2-filter'));
        // exit;

        $postcode_filter = (Session::has('postcode-filter'))?(Session::get('postcode-filter')):"null";
        $radius_filter = Session::has('radius-filter');

        $rating_filter = (Session::has('rating-filter'))?(Session::get('rating-filter')):"null";
        $price_filter = (Session::has('price-filter'))?(Session::get('price-filter')):"null";
        $gender_filter = (Session::has('gender-filter'))?(Session::get('gender-filter')):"null";
        $service_filter = (Session::has('service-filter'))?(Session::get('service-fitler')):"null";
        $service2_filter = (Session::has('service2-filter'))?(Session::get('service2-filter')):"null";
        //sort by

        $order = (Session::has('giver-order'))?(Session::get('giver-order')):"avg";


        if(Input::has('postcode-filter') && Input::has('radius-filter')){
            Session::put('postcode-filter', Input::get('postcode-filter'));
            $postcode_filter = Input::get('postcode-filter');
        }

        if(Input::has('gender-filter')){
            Session::put('gender-filter', Input::get('gender-filter'));
            $gender_filter = Input::get('gender-filter');
        }

        if(Input::has('service-filter')){
            Session::put('service-filter', Input::get('service-filter'));
            $service_filter = Input::get('service-filter');
        }

        if(Input::has('service2-filter')){
            Session::put('service2-filter', Input::get('service2-filter'));
            $service2_filter = Input::get('service2-filter');
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

        $givers = Giver::filterAllGivers($postcode_filter, $gender_filter, $service_filter, $service2_filter, $min_price, $max_price, $min_rating, $max_rating, $order);

        foreach ($givers as $g){
            $rating[$g->uid] = Rating::MyRating($g->uid);
        }

        $sf = array();
        if(is_array($service_filter) && !empty($service_filter)){
            foreach ($service_filter as $s){
                $sf[$s] = true;
            }
        }
        

        $sf2 = array();
        if(is_array($service2_filter) && !empty($service2_filter)){
            foreach ($service2_filter as $s){
                $sf2[$s] = true;
            }
        }
        $suburbs = Giver::getAllSuburbs();
        return view('giver.list',compact('givers', 'rating', 'suburbs','postcode_filter', 'sf', 'sf2', 'rating_filter', 'price_filter','order'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($uid)
    {
        $states = Suburb::getStates();
        return view('giver.create', compact(array('uid', 'states')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $uid = Input::get('uid');
        $step = Input::get('step');
        switch ($step){
            case "1":
                $giver = new Giver;
                $giver->uid = $uid;
                $giver->gender = Input::get("gender");
                $giver->address1 = Input::get('address1');
                $giver->address2 = Input::get('address2');
                $giver->state = Input::get('state');
                $giver->suburb = Input::get('suburb');
                $giver->postcode = Input::get('postcode');
                
                if(Input::file('picture')){
                    $pic_name = "photo-".$uid;
                    $pic_path = public_path('images/user');
                    $pic_extension = Input::file('picture')->getClientOriginalExtension();
                    if(Input::file('picture')->move($pic_path, $pic_name.'.'.$pic_extension)){
                        $giver->picture = $pic_name.'.'.$pic_extension;
                    }
                } 

                
                if(Input::file('background-check')){
                    $bc_name = "background-check-".$uid;
                    $bc_path = public_path('uploaded_files/user');
                    $bc_extension = Input::file('background-check')->getClientOriginalExtension();
                    if(Input::file('background-check')->move($bc_path, $bc_name.'.'.$bc_extension)){
                        $giver->background_check = $bc_name.'.'.$bc_extension;
                    }
                } 

                $giver->save();
                return Redirect::route('care_givers.storeProfile1');    
            break;
            case "2":
                $giver = Giver::find($uid);
                $giver->bio = Input::get('bio');
                $giver->live_in = Input::get('live_in');
                $giver->experience = Input::get('experience');
                $giver->years_exp = Input::get('years_exp');
                $giver->education = Input::get('education');
                $giver->rate = Input::get('rate');
                $giver->save();
                return Redirect::route('care_givers.storeProfile2'); 
            break;
            case "3":
                $services = Input::get('service');
                $services2  = Input::get('service2');
                $quolifications = Input::get('quolification');

                //availability
                $avail = Input::get('avai');


                if(is_array($services) && sizeof($services) > 0){
                    foreach ($services as $s){
                        $ser = new Service;
                        $ser->giver_id = $uid;
                        $ser->service_name = $s;
                        $ser->save();
                    }
                }

                if(is_array($services2) && sizeof($services2) > 0){
                    foreach ($services2 as $s){
                        $ser = new Service2;
                        $ser->giver_id = $uid;
                        $ser->service_name = $s;
                        $ser->save();
                    }
                }

                if(is_array($quolifications) && sizeof($quolifications) > 0){
                    foreach ($quolifications as $q){
                        $quo = new Quolification;
                        $quo->giver_id = $uid;
                        $quo->quolification_name = $q;
                        $quo->save();
                    }
                }

                if(is_array($avail) && sizeof($avail)>0){
                    foreach ( $avail as $k =>$a ){
                        foreach($a as $f => $t){
                            $avai = new Availability;
                            $avai->giver_id = $uid;
                            $avai->week = $f;
                            $avai->time = $k;
                            $avai->av = $t;
                            $avai->save();
                        }                       
                    }
                }
                
                // $user = new User;
                // $user = User::findorFail($uid);
                // $user->status = "Active";
                // $user->save();

                return Redirect::route('care_givers.show', array('uid' => $uid)); 
            break;
        }      
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

        $test = Rating::getAvgRating();
        return view('giver.show', compact(array(
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
        $giver = Giver::findorFail($id);
        $states = Suburb::getStates();
        // $suburbs = Suburb::getSuburbs($giver->state);
        return view("giver.edit-p1", compact(array("giver", 'states')));
    }

    public function edit2($id){
        $giver = Giver::findorFail($id);
        return view("giver.edit-p2", compact(array("giver")));
    }

    public function edit3($id){
        $giver = Giver::findorFail($id);
        $services = Service::MyServices($id);
        $services2 = Service2::MyServices($id);

        $ser = array();
        foreach ($services as $s){
            $ser[$s->service_name] = 1;
        }

        $ser2 = array();
        foreach ($services2 as $s){
            $ser2[$s->service_name] = 1;
        }

        $quolifications = Quolification::MyQuolifications($id);

        $availabilities = Availability::MyAvailability($id);

        $avai = array();
        foreach ($availabilities as $ava){
            $avai[$ava->time][$ava->week] = $ava->av;
        }
        return view("giver.edit-p3", compact(array("giver", "ser","ser2","quolifications", "avai")));
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
        $giver = Giver::findorFail($id);
        
        if(Input::has("gender")){
            $giver->gender = Input::get("gender");
        }
        if(Input::has('address1')){
            $giver->address1 = Input::get('address1');
        }
        if(Input::has('address2')){
            $giver->address2 = Input::get('address2');
        }
        if(Input::has('state')){
            $giver->state = Input::get('state');
        }
        if(Input::has('suburb')){
            $giver->suburb = Input::get('suburb');
        }
        if(Input::has('postcode')){
            $giver->postcode = Input::get('postcode');
        }
        
        if(Input::file('picture')){
            $pic_name = "photo-".$id;
            $pic_path = public_path('images/user');
            $pic_extension = Input::file('picture')->getClientOriginalExtension();
            if(Input::file('picture')->move($pic_path, $pic_name.'.'.$pic_extension)){
                $giver->picture = $pic_name.'.'.$pic_extension;
            }
        }
        if(Input::has('bio')){
            $giver->bio = Input::get('bio');
        }
        if(Input::has('live_in')){
            $giver->live_in = Input::get('live_in');
        }
        if(Input::has('years_exp')){
            $giver->years_exp = Input::get('years_exp');
        }
        if(Input::has('experience')){
            $giver->experience = Input::get('experience');
        }
        if(Input::has('education')){
            $giver->education = Input::get('education');
        }
        if(Input::has('rate')){
            $giver->rate = Input::get('rate');
        }

        if(Input::has('service')){
            Service::deleteMyServices($id);
            $services = Input::get('service');
            if(is_array($services) && sizeof($services) > 0){
                foreach ($services as $s){
                    $ser = new Service;
                    $ser->giver_id = $id;
                    $ser->service_name = $s;
                    $ser->save();
                }
            }
        }

        if(Input::has('service2')){
            Service2::deleteMyServices($id);
            $services2 = Input::get('service2');
            if(is_array($services2) && sizeof($services2) > 0){
                foreach ($services2 as $s){
                    $ser = new Service2;
                    $ser->giver_id = $id;
                    $ser->service_name = $s;
                    $ser->save();
                }
            }
        }


        if(Input::has('quolification')){
            Quolification::deleteMyQuolifications($id);
            $quolifications = Input::get('quolification');
            if(is_array($quolifications) && sizeof($quolifications) > 0){
                foreach ($quolifications as $q){
                    $quo = new Quolification;
                    $quo->giver_id = $id;
                    $quo->quolification_name = $q;
                    $quo->save();
                }
            }
        }

        if(Input::has('avai')){
            Availability::deletMyAvailability($id);
            $avail = Input::get('avai');
            if(is_array($avail) && sizeof($avail)>0){
                foreach ( $avail as $k =>$a ){
                    foreach($a as $f => $t){
                        $avai = new Availability;
                        $avai->giver_id = $id;
                        $avai->week = $f;
                        $avai->time = $k;
                        $avai->av = $t;
                        $avai->save();
                    }                       
                }
            }
        }
        
        $giver->save();
        return Redirect::route('care_givers.show', array('uid' => $id)); 
    }

    

    public function storeProfile1(){
        return view("giver.profile1");
    }

    public function storeProfile2(){
        return view("giver.profile2");
    }

    public function ajaxCall(Request $request){
        $t = Location::getNearBy(2135, 10);
        var_dump(sizeof($t));

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
}
