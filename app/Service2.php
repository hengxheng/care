<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Service2 extends Model
{
    protected $table = "service2";

    public static function MyServices($uid){
    	return DB::table('service2')->where('giver_id','=', $uid)->get();
    }

    public static function deleteMyServices($uid){
    	return DB::table('service2')->where('giver_id','=',$uid)->delete();
    }

    public static function WithService($service_names){
        if(is_array($service_names)){
            $givers = DB::table('service2')
            ->select('giver_id')
            ->whereIn('service_name', $service_names);

            return $givers->get();
        }
        return DB::table('service2')->select('giver_id')->where('service_name', '=', $service_names)->get();
    }
}
