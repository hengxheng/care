<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $table = "availability";

    public static function MyAvailability( $uid ){
    	return DB::table("availability")->where("giver_id", "=", $uid)->OrderBy('time')->get();
        
    }

    public static function WithAvailabilityByWeek( $weekday ){
    	return DB::table("availability")->where("week","=", $weekday)->get();
    }

    public static function WithAvailabilityByTime( $time ){
    	return DB::table("availability")->where("time", "=", $time )->get();
    }


}
