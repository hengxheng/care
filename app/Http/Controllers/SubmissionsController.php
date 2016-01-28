<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Submission;
use App\Job;
use App\Message;
use App\user;
use Redirect;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SubmissionsController extends Controller
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
    public function create($jid, $uid)
    {

        return view('submission.create', compact(array('jid','uid')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $submission = new Submission;
        $submission->job_id = input::get('jid');
        $submission->submited_uid = input::get('uid');
        $submission->content = input::get('content');
        $submission->save();

        $poster = Job::getJobPoster(input::get('jid'));
        $admin = User::getAdmin();

        $job_url = url('job/'.input::get('jid'), $parameters = [], $secure = null);

        $message = new Message;
        $message->receiver_id = $poster->id;
        $message->sender_id = $admin->id;
        $message->subject = "New job submission";
        $message->content = 'Hi '.$poster->firstname.'<br/>Someone just applied for your job, click <a href="'.$job_url.'">here</a> to view.<br/><br/>Admin';
        $message->save();

        return Redirect::route('job.search', array('uid' => input::get('uid')));
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
