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

    public static function WithService($service_names){
        if(is_array($service_names)){
            $givers = DB::table('service')
            ->select('giver_id');
            
            foreach($service_names as $n){
                $givers->where('service_name', '=', $n);
            }

            return $givers->get();
        }
    	return DB::table('service')->select('giver_id')->where('service_name', '=', $service_names)->get();
    }
}
