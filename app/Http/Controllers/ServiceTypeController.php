<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceTypeController extends Controller
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
    public function create($uid)
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
         $input_data = Input::all();       
         $service = New Service;
         $service->giver_id = $input_data['giver_id'];
         $service->service_name = $input_data['service_name'];
         $service->save();
         return $service;
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
        $the_service = Service::findOrFail($id);

        $the_service->delete();

        // Session::flash('message', 'The message successfully deleted!');

        return "Deleted";
    }

    public function MyServices(Request $request){
        $data = Input::get('uid');
        $services = Service::MyServices($data);
        return $services;
    }
}
