<?php

namespace App\Http\Controllers;

use App\Giver;
use App\User;
use App\Job;
use App\Service;
use App\Quolification;
use App\Availability;
use Auth;
use Input;
use Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Session;
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
        $givers = Giver::allGivers();
        return view('giver.list',compact('givers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($uid)
    {
        return view('giver.create', compact(array('uid')));
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
                
                $pic_name = "photo-".$uid;
                $pic_path = public_path('images/user');
                $pic_extension = Input::file('picture')->getClientOriginalExtension();
                if(Input::file('picture')->move($pic_path, $pic_name.'.'.$pic_extension)){
                    $giver->picture = $pic_name.'.'.$pic_extension;
                }
                $giver->save();
                return Redirect::route('care_givers.storeProfile1');    
            break;
            case "2":
                $giver = Giver::find($uid);
                $giver->experience = Input::get('experience');
                $giver->education = Input::get('education');
                $giver->rate = Input::get('rate');
                $giver->save();
                return Redirect::route('care_givers.storeProfile2'); 
            break;
            case "3":
                $services = Input::get('service');
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
                
                $user = new User;
                $user = User::findorFail($uid);
                $user->status = "Active";
                $user->save();

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
        $my_quolifications = Quolification::MyQuolifications($id);
        $av = Availability::MyAvailability($id);

        $my_availability = array();
        foreach ($av as $a){
            $my_availability[$a->week][$a->time] = $a->av; 
        }
        return view('giver.show', compact(array('the_user', 'the_giver','my_services','my_quolifications', 'my_availability')));
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
        return view("giver.edit-p1", compact(array("giver")));
    }

    public function edit2($id){
        $giver = Giver::findorFail($id);
        return view("giver.edit-p2", compact(array("giver")));
    }

    public function edit3($id){
        $giver = Giver::findorFail($id);
        $services = Service::MyServices($id);
        $ser = array();
        foreach ($services as $s){
            $ser[$s->service_name] = 1;
        }
        $quolifications = Quolification::MyQuolifications($id);

        $availabilities = Availability::MyAvailability($id);

        $avai = array();
        foreach ($availabilities as $ava){
            $avai[$ava->time][$ava->week] = $ava->av;
        }
        return view("giver.edit-p3", compact(array("giver", "ser","quolifications", "avai")));
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
        
        $giver->gender = Input::get("gender");
        $giver->address1 = Input::get('address1');
        $giver->address2 = Input::get('address2');
        $giver->state = Input::get('state');
        $giver->suburb = Input::get('suburb');
        $giver->postcode = Input::get('postcode');
        if(Input::file('picture')){
            $pic_name = "photo-".$id;
            $pic_path = public_path('images/user');
            $pic_extension = Input::file('picture')->getClientOriginalExtension();
            if(Input::file('picture')->move($pic_path, $pic_name.'.'.$pic_extension)){
                $giver->picture = $pic_name.'.'.$pic_extension;
            }
        }

        if(Input::get('experience')){
            $giver->experience = Input::get('experience');
        }

        if(Input::get('service')){
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

        if(Input::get('quolification')){
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

        if(Input::get('avai')){
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

    public function storeProfile1(){
        return view("giver.profile1");
    }

    public function storeProfile2(){
        return view("giver.profile2");
    }

    public function ajaxCall(Request $request){
        $givers = Giver::allGivers();
        return $givers;
    }
}
