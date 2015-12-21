<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Redirect;
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
            return view('welcome');
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
}
