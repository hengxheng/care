<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Message;
use Input;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
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
    public function create($to_id)
    {
        $to_user = User::find($to_id);
        // $messages = Message::find
        return view('message.create',compact('to_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = input::all();
        $message = new Message;
        $message->receiver_id = input::get('to_id');
        $message->sender_id = input::get('from_id');
        $message->content = input::get('content');
        $message->save();

        return Redirect()->back();
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

    public function sendedMessage($uid){
        $messages = Message::where('sender_id','=',$uid)->get();
        return $messages;
    }

    public function receivedMessage($uid){
        $messages = Message::where('receiver_id','=',$uid)->get();
        return $messages;
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
