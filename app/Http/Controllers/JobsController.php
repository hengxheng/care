<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Input;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $jobs = Job::all();
        return view('job.index', compact('jobs'));
    }

    public function search()
    {
        $state_filter = (Session::has('job-state-filter'))?(Session::get('job-state-filter')):"null";
        $suburb_filter = (Session::has('job-suburb-filter'))?(Session::get('job-suburb-filter')):"null";
        $services_filter = (Session::has('job-services-filter'))?(Session::get('job-services-filter')):array();


        $order = (Session::has('job-order'))?(Session::get('job-order')):"start_date";

        if(Input::has('job-state-filter')){
            Session::put('job-state-filter', Input::get('job-state-filter'));
            $state_filter = Input::get('job-state-filter');
        }
        if(Input::has('job-suburb-filter')){
            Session::put('job-suburb-filter', Input::get('job-suburb-filter'));
            $suburb_filter = Input::get('job-suburb-filter');
        }
        if(Input::has('job-services-filter')){
            Session::put('job-services-filter', Input::get('job-services-filter'));
            $services_filter = Input::get('job-services-filter');
        }
        if(Input::has('job-order')){
            Session::put('job-order', Input::get('job-order'));
            $order = Input::get('job-order');
        }

        $suburbs = Job::getAllSuburbs();

        $serv = array( 
            "Meal preparation" => false,
            "Alzheimer's Care" => false,
            "Companionship" => false,
            "Housekeeping" => false,
            "Transportation" => false,
            "Personal Care" => false,
            );
        foreach ($services_filter as $s){
            $serv[$s] = true;
        }

        $jobs = Job::search($state_filter, $suburb_filter, $services_filter, $order, "Active");

        return view('job.search', compact('jobs', 'suburbs', 'serv', 'state_filter', 'suburb_filter', 'services_filter', 'order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id)
    {
        return view('job.create',compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'service' => 'required',
            'state' => 'required',
            'suburb' => 'required',
            'start_date' => 'required'
        ]);

        $uid = Input::get('uid');
        $job = new Job;
        $job->poster_id = $uid;
        $job->title = Input::get('title');

        $serv = Input::get('service');
        $_serv = "";
        foreach ($serv as $s){
            $_serv .= $s.',';
        }
        $_serv = substr($_serv,0,-1);
        $job->service_name = $_serv;
        $job->state = Input::get('state');
        $job->start_date = date("Y-m-d", strtotime(Input::get('start_date')));
        $job->description = Input::get('description');
        $job->suburb = Input::get('suburb');
        $job->postcode = Input::get('postcode');
        $job->status = "Active";
        $job->save();

        return Redirect::route("job.show",array('id' => $job->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $job = Job::find($id);
        $_serv = $job->service_name;
        $serv = explode("," ,$_serv);
        return view("job.show", compact('job', 'serv'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $job = Job::find($id);

        $_serv = $job->service_name;
        $serv = explode("," ,$_serv);
        $services = array( 
            "Meal preparation" => false,
            "Alzheimer's Care" => false,
            "Companionship" => false,
            "Housekeeping" => false,
            "Transportation" => false,
            "Personal Care" => false,
            );
        foreach ($serv as $s){
            $services[$s] = true;
        }
        return view("job.edit", compact('job', 'services'));
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
        $job = Job::findOrFail($id);

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'service' => 'required',
            'state' => 'required',
            'suburb' => 'required',
            'start_date' => 'required'
        ]);

        $job->title = Input::get('title');

        $serv = Input::get('service');
        $_serv = "";
        foreach ($serv as $s){
            $_serv .= $s.',';
        }
        $_serv = substr($_serv,0,-1);

        $job->service_name = $_serv;
        $job->state = Input::get('state');
        $job->start_date = date("Y-m-d", strtotime(Input::get('start_date')));
        $job->description = Input::get('description');
        $job->suburb = Input::get('suburb');
        $job->postcode = Input::get('postcode');
        $job->status = $request->status;

        $job->save();

        Session::flash('message', 'Job successfully updated!');

        return Redirect::route("job.show",array('id' => $job->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);

        $job->delete();

        Session::flash('message', 'Job successfully deleted!');

        return redirect()->back();
    }

    public function delete($id){

        $job = Job::findOrFail($id);

        $job->delete();

        Session::flash('message', 'Job successfully deleted!');

        return redirect()->back();
    }

    public function listing($poster_id){
        $jobs = Job::where('poster_id', '=', $poster_id) -> get();
        return view("job.list", compact('jobs'));
    }

}
