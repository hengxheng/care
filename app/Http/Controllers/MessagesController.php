<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Redirect;
use Session;
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
        $message->subject = input::get('subject');
        $message->content = input::get('content');
        $message->save();

        return redirect::route('message.inbox');
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
        $msg = Message::findOrFail($id);

        $msg -> delete();

        Session::flash('message', 'The message successfully deleted!');

        return redirect()->back();
    }

    public function sentmsg(){
        $user = Auth::user();
        $messages = Message::mySentMessages($user->id);
        return view('message.sent',compact('messages'));
    }

    public function receivedmsg(){
        $user = Auth::user();      
        $messages = Message::myMessages($user->id);

        return view('message.inbox',compact('messages'));
    }

    public function show($type, $id){
        $message = Message::getTheMessage($id, $type);

        if( ($message->receiver_id == Auth::user()->id)&&($message->unread == "1") ){
            $msg = Message::findorFail($id);
            $msg->unread = 0;
            $msg->save();
        }
        
        return view("message.show", compact('message'));
    }

}
