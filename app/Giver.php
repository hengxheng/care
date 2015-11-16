<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Giver extends Model
{
    protected $table = 'giver';
    protected $primaryKey = 'uid';

    public static function getAllGivers(){
        return DB::table('giver')
        ->leftJoin('users', 'giver.uid','=','users.id')
        ->groupBy('giver.uid')
        ->get();
    }

    public static function filterAllGivers($state="null", $suburb="null", $min_rate="null", $max_rate="null", $min_rating=0, $max_rating=5){
        $givers = DB::table('giver AS g')
        ->leftJoin('users AS u','g.uid','=','u.id')
        ->leftJoin(DB::raw('(SELECT rate_uid, avg(rate_star) AS avg FROM rating GROUP BY rate_uid) AS r'), 'r.rate_uid', '=', 'g.uid')
        ->where('r.avg','>=',$min_rating)
        ->where('r.avg','<=',$max_rating);

        if($state != 'null'){
            $givers->where('giver.state','=', $state);
        }
        if($suburb != 'null'){
            $givers->where('giver.suburb','=', $suburb);
        }
        if(($max_rate != 'null') && ($min_rate != 'null')){
            $max = (int)$max_rate;
            $min = (int)$min_rate;
            $givers->where('giver.rate','>=',$min)
             ->where('giver.rate', '<=', $max);
        }
        return $givers->get();//->groupBy('giver.uid')->get();
        
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

    public static function filterBySuburb($suburb){
        return DB::table('giver')
        ->where('suburb','=',$suburb)
        ->get();
    }

    public static function filterByRate($min, $max){
        return DB::table('giver')
        ->where('rate','>=',$min)
        ->where('rate','<=',$max)
        ->get();
    }

    public static function filterByRating($min, $max){
        $rating = DB::table('rating')
                    ->select('rate_uid','rate_star')
                    ->where('rating','>=', $min)
                    ->where('rating','<=', $max)
                    ->groupBy('rate_uid')
                    ->get();
    }

}
