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
                ->select('message.*','users.id as uid','users.firstname','users.lastname')
    			->where('message.receiver_id', '=', $uid)
    			->groupBy('message.sender_id')
    			->orderBy('message.created_at')
    			->get();

    }

    public static function mySentMessages($uid){
    	return DB::table('message')
                ->leftJoin('users', 'message.receiver_id', '=', 'users.id')
                ->select('message.*','users.id as uid','users.firstname','users.lastname')
                ->where('message.sender_id', '=', $uid)
                ->groupBy('message.receiver_id')
                ->orderBy('message.created_at')
                ->get();
    }

    public static function myMessage($id){
        return DB::table('message')
                ->leftJoin('users', 'message.sender_id', '=', 'users.id')
                ->select('message.*','users.id as uid','users.firstname','users.lastname')
                ->where('message.id', '=', $id)
                ->groupBy('message.sender_id')
                ->orderBy('message.created_at')
                ->first();
    }

    public static function mySentMessage($id){
        return DB::table('message')
                ->leftJoin('users', 'message.receiver_id', '=', 'users.id')
                ->select('message.*','users.id as uid','users.firstname','users.lastname')
                ->where('message.id', '=', $id)
                ->groupBy('message.receiver_id')
                ->orderBy('message.created_at')
                ->first();
    }
}
