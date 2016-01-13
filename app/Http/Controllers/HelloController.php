<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Redirect;
use Input;
use Hash;
use Session;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HelloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if(Auth::check()){
            $user_type = Auth::user()->user_type;
            $user_status = Auth::user()->status;
            if($user_status != "Inactive"){
                if($user_type == "giver"){
                    return redirect::route('care_givers.show',array('uid'=>Auth::user()->id));
                }
                elseif($user_type == "seeker"){
                    return redirect::route('care_seekers.show',array('uid'=>Auth::user()->id));
                }
            }            
            else{
                if($user_type == "giver"){
                    return redirect::route('care_givers.create');
                }
                elseif($user_type == "seeker"){
                    return redirect::route('care_seekers.create');
                }
            }
        }
        else{
            return redirect('login');
        }
        
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
        //
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

    protected function changeSettings(){
        return view('auth.settings');
    }

    protected function changePassword(Request $request){
        $this->validate($request, [
                'password' => 'required|min:6',
                'confirm_new_password' => 'required|same:password'
            ]);

        $user = User::find(Auth::user()->id);
        $new_pass = Input::get('password');

        $user->password = Hash::make($new_pass);
        $user->save();
        Session::flash('message', 'Your password has been changed!');
        return Redirect::back();
    }
}
