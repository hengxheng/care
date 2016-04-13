<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Seeker;
use App\Giver;
use Input;
use Mail;

class AdminController extends Controller
{

    public function login(){
        return view('admin.login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        $s = Seeker::getTotal();
        $g = Giver::getTotal();

        return view('admin.index', compact('s', 'g'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
      
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

    public function changeUserStatus(){
        $uid = Input::get('uid');
        $status = Input::get('status');
        $user = User::findorFail($uid);
        $user->status = $status;
        
        $fname = $user->firstname;
        $lname = $user->lastname;
        $hmail = $user->email;

        $user->save();

        if($status == "Active"){
            Mail::send('emails.account_actived',array('firstname' => $fname, 'lastname' => $lname, 'email' => $hmail ), function($message) use ($hmail) {
                $message->to($hmail , "CareNation Customer")->subject('Account actived with CareNation.com.au!');
            });
        }


        return $status;
    }

    public function changeJobStatus(){
        $jid = Input::get('jid');
        $status = Input::get('status');

        return $jid;
        // $job = Job::findorFail($jid);
        // $job->status = $status;
        // $job->save();
        // return $status;
    }
}
