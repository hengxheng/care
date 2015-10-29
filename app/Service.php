<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = "service";

    public static function MyServices($uid){
    	return DB::table('service')->where('giver_id','=', $uid)->get();
    }

    public static function deleteMyServices($uid){
    	return DB::table('service')->where('giver_id','=',$uid)->delete();
    }

    public static function WithService($service_name){
    	return DB::table('service')->where('service_name', '=', $service_name)->get();
    }
}
