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
                ->leftJoin('seeker', 'message.sender_id', '=' ,'seeker.uid')
                ->leftJoin('giver', 'message.sender_id', '=', 'giver.uid')
                ->select('message.*','users.id as uid','users.firstname','users.lastname','users.user_type','seeker.picture AS s_pic','giver.picture AS g_pic')
    			->where('message.receiver_id', '=', $uid)
    			->orderBy('message.created_at')
    			->get();
    }

    public static function mySentMessages($uid){
    	return DB::table('message')
                ->leftJoin('users', 'message.receiver_id', '=', 'users.id')
                ->leftJoin('seeker', 'message.receiver_id', '=' ,'seeker.uid')
                ->leftJoin('giver', 'message.receiver_id', '=', 'giver.uid')
                ->select('message.*','users.id as uid','users.firstname','users.lastname','users.user_type','seeker.picture AS s_pic','giver.picture AS g_pic')
                ->where('message.sender_id', '=', $uid)
                ->orderBy('message.created_at')
                ->get();
    }

    public static function getTheMessage($id, $type){
        if($type == "SENDER"){
            $msg = DB::table('message')
                ->leftJoin('users', 'message.sender_id', '=', 'users.id')
                ->leftJoin('seeker', 'message.sender_id', '=' ,'seeker.uid')
                ->leftJoin('giver', 'message.sender_id', '=', 'giver.uid')      
                ->select('message.*','users.id as uid','users.firstname','users.lastname','users.user_type','seeker.picture AS s_pic','giver.picture AS g_pic')
                ->where('message.id', '=', $id)
                ->first();
        }
        else if($type == "RECEIVER"){
            $msg = DB::table('message')
                ->leftJoin('users', 'message.receiver_id', '=', 'users.id')
                ->leftJoin('seeker', 'message.receiver_id', '=' ,'seeker.uid')
                ->leftJoin('giver', 'message.receiver_id', '=', 'giver.uid')      
                ->select('message.*','users.id as uid','users.firstname','users.lastname','users.user_type','seeker.picture AS s_pic','giver.picture AS g_pic')
                ->where('message.id', '=', $id)
                ->first();
        }
        return $msg;
    }
}
