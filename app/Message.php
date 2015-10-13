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
    			->where('message.receiver_id', '=', $uid)
    			->groupBy('message.sender_id')
    			->orderBy('message.created_at')
    			->get();

    }

    public static function mySentMessages($uid){
    	return Message::where('sender_id', '=', $uid)->get();
    }
}
