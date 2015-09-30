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
            'description' => 'required'
        ]);

        $uid = Input::get('uid');
        $job = new Job;
        $job->poster_id = $uid;
        $job->title = Input::get('title');
        $job->description = Input::get('description');
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
        return view("job.show", compact('job'));
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
        return view("job.edit", compact('job'));
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
            'description' => 'required'
        ]);

        $job->title = $request->title;
        $job->description = $request->description;
        $job->status = $request->status;

        $job->save();

        Session::flash('message', 'Job successfully updated!');

        return redirect()->back();
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
