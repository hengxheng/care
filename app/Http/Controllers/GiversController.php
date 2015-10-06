<?php

namespace App\Http\Controllers;

use App\Giver;
use App\User;
use App\Job;
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
        $givers = Giver::all();
        return view('giver.list',compact('givers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($uid)
    {
        return view('giver.store', compact(array('uid')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input_data = Input::all();
        $error = "";
        $user = User::create($input_data);

        $user_id = $user->id;

        if($input_data['user_type'] == 'giver'){
            return Redirect::route('care_givers.personal-detail', array('uid' => $user_id));
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

        return view('giver.show', compact(array('the_user', 'the_giver')));
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
    public function storeDetails(){
        $uid = Input::get('uid');
        $giver = new Giver;
        $giver->uid = $uid;
        $giver->gender = Input::get("gender");
        $giver->address1 = Input::get('address1');
        $giver->address2 = Input::get('address2');
        $giver->state = Input::get('state');
        $giver->suburb = Input::get('suburb');
        $giver->postcode = Input::get('postcode');
        
        $pic_name = $uid;
        $pic_path = public_path('images');
        $pic_extension = Input::file('picture')->getClientOriginalExtension();
        if(Input::file('picture')->move($pic_path, $pic_name.'.'.$pic_extension)){
            $giver->picture = $pic_path."/".$pic_name.'.'.$pic_extension;
        }
        $giver->save();
        return Redirect::route('care_givers.show', array('uid' => $uid ));

    }
}
