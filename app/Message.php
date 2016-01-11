<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = "message";

    public static function myMessages($uid){
    	return DB::table('message')
    			->leftJoin('users', 'message.sender_id', '=', 'users.id')
                ->select('message.*','users.id as uid','users.firstname','users.lastname','users.user_type','users.picture')
    			->where('message.receiver_id', '=', $uid)
    			->orderBy('message.created_at', 'DESC')
    			->paginate(10);
    }

    public static function myUnReadMsg($uid){
        $msg = DB::table('message')
                ->where('unread', '=', 1)
                ->where('receiver_id', '=', $uid)
                ->get();

        return sizeof($msg);
    }

    public static function mySentMessages($uid){
    	return DB::table('message')
                ->leftJoin('users', 'message.receiver_id', '=', 'users.id')
                // ->leftJoin('seeker', 'message.receiver_id', '=' ,'seeker.uid')
                // ->leftJoin('giver', 'message.receiver_id', '=', 'giver.uid')
                ->select('message.*','users.id as uid','users.firstname','users.lastname','users.user_type','users.picture')
                ->where('message.sender_id', '=', $uid)
                ->orderBy('message.created_at', 'DESC')
                ->paginate(10);
    }

    public static function getTheMessage($id, $type){
        if($type == "from"){
            $msg = DB::table('message')
                ->leftJoin('users', 'message.sender_id', '=', 'users.id')
                // ->leftJoin('seeker', 'message.sender_id', '=' ,'seeker.uid')
                // ->leftJoin('giver', 'message.sender_id', '=', 'giver.uid')      
                ->select('message.*','users.id as uid','users.firstname','users.lastname','users.user_type','users.picture')
                ->where('message.id', '=', $id)
                ->first();
        }
        else if($type == "to"){
            $msg = DB::table('message')
                ->leftJoin('users', 'message.receiver_id', '=', 'users.id')
                // ->leftJoin('seeker', 'message.receiver_id', '=' ,'seeker.uid')
                // ->leftJoin('giver', 'message.receiver_id', '=', 'giver.uid')      
                ->select('message.*','users.id as uid','users.firstname','users.lastname','users.user_type','users.picture')
                ->where('message.id', '=', $id)
                ->first();
        }
        return $msg;
    }
}
