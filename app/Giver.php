<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Giver extends Model
{
    protected $table = 'giver';
    protected $primaryKey = 'uid';

    public static function allGivers(){
    	return DB::table('giver')
    	->leftJoin('users', 'giver.uid','=','users.id')
    	->groupBy('giver.uid')
    	->get();
    }

    public static function getAllStates(){
        return DB::table('giver')
        ->select('state')
        ->groupBy('state')
        ->get();
    }

    public static function getAllSuburbs(){
    	return DB::table('giver')
        ->select('suburb')
        ->groupBy('suburb')
        ->get();
    }

    public static function filterByState($state){
        return DB::table('giver')
        ->where('state','=',$state)
        ->get();
    }

    public static function filterBySuburbs($suburb){
        return DB::table('giver')
        ->where('suburb','=',$suburb)
        ->get();
    }

}
