<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\User;
use App\Seeker;
use Redirect;

class SeekersController extends Controller
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
    public function create($id)
    {
        // $method = Request::method();
     
        if (!empty($_POST)){

        }
        else{
            return view('seeker.create', compact('id'));
        }
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

        $seeker = new Seeker;
        $seeker->uid = $uid;
        $seeker->premium = Input::get('premium');

        $seeker->save();

        return Redirect::route('care_seekers.show', array('id' => $uid));

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
        $the_seeker = Seeker::find($id);

        return view('seeker.show', compact(array('the_user', 'the_seeker')));
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
