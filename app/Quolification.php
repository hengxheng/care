<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quolification extends Model
{
    protected $table = "quolification";
    public static function MyQuolifications($uid){
    	return DB::table('quolification')->where('giver_id','=', $uid)->get();
    }

    public static function WithQuolification($quolification_name){
    	return DB::table('quolification')->where('quolification_name', '=', $service_name)->get();
    }

}
