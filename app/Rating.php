<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Rating extends Model
{
    protected $table = "rating";
    protected $primaryKey = "rid";

    public static function MyRating($uid){
    	$myRate = DB::table("rating")
    	->where("rate_uid","=",$uid)
    	->select("rate_star")
    	->get();

    	$count = sizeof($myRate)?sizeof($myRate):1;

    	$sum = 0;
    	foreach ($myRate as $r){
    		$sum += $r->rate_star;
    	}

    	return ceil($sum/$count);
    }

    public static function getAvgRating(){
        return DB::table("rating")
        ->select("rate_uid",DB::raw('avg(rate_star) as avg'))  
        ->groupBy("rate_uid")
        ->get();
    }
}
