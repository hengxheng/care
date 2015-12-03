<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Users;
use App\Seeker;
use App\Giver;


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
        $_givers = Giver::getAllGivers();
        $givers = array_slice($_givers, 0, 3);

        $_seekers = Seeker::getAllSeekers();
        $seekers = array_slice($_seekers, 0, 3);

        return view('admin.index', compact('givers', 'seekers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        echo "asfsdaf";
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

    public function changeUserStatus($uid, $status){
        $user = Users::findorFail($uid);
        $user->status = $status;
        $user->save();
        return $status;
    }

    public function changeJobStatus($jid, $status){
        $job = Job::findorFail($jid);
        $job->status = $status;
        $job->save();
        return $status;
    }
}
