<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Suburb extends Model
{
    protected $table = "suburb";

    public static function getStates(){
    	return DB::table('suburb')
    	        ->select('state')
    	        ->groupBy('state')
    	        ->get();
    }

    public static function getSuburbs($state){
    	return DB::table('suburb')
    	       ->select('suburb')
    	       ->where('state','=', $state)
    	       ->groupBy('suburb')
    	       ->get();
    }
}
