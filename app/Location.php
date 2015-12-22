<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = "location";

    public static function getNearBy($postcode, $radius){
    	$_this = DB::table("location")->where("postcode", "=", $postcode)->first();
    	if(!count($_this)){
            return array();
        }
    	$lng = $_this->longitude / 180 * M_PI;
    	$lat = $_this->latitude / 180 * M_PI;

		$raw_sql = "SELECT DISTINCT au.postcode,au.locality,(6367.41*SQRT(2*(1-cos(RADIANS(au.latitude))*cos(".$lat.")*(sin(RADIANS(au.longitude))*sin(".$lng.")+cos(RADIANS(au.longitude))*cos(".$lng."))-sin(RADIANS(au.latitude))* sin(".$lat.")))) AS Distance 
        FROM location AS au WHERE (6367.41*SQRT(2*(1-cos(RADIANS(au.latitude))*cos(".$lat.")*(sin(RADIANS(au.longitude))*sin(".$lng.")+cos(RADIANS(au.longitude))*cos(".$lng."))-sin(RADIANS(au.latitude))*sin(".$lat."))) <= ".$radius.") ORDER BY Distance";
		
		$locations = DB::select( DB::raw($raw_sql));

    	return $locations;
    }

    public static function getByState($state){
    	return DB::table("location")
    	->select("postcode", "locality")
    	->where("region1", "=", $state)
        ->groupBy('locality')
    	->get();
    }

}
