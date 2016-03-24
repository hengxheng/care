<?php

namespace App;
use DB;
use App\Service;
use App\Service2;
use App\Location;
use Illuminate\Database\Eloquent\Model;

class Giver extends Model
{
    protected $table = 'giver';
    protected $primaryKey = 'uid';

    public static function getAllGivers(){
        return DB::table('giver')
        ->leftJoin('users', 'giver.uid','=','users.id')
        ->groupBy('giver.uid')
        ->orderBy('users.created_at', 'desc')
        ->paginate(5);
    }

    public static function filterAllGivers($postcode, $radius, $gender="null", $service_filter, $service2_filter, $min_rate="null", $max_rate="null", $min_rating="null", $max_rating="null", $order="avg", $status="Active"){

        $givers = DB::table('giver AS g')
        ->leftJoin('users AS u','g.uid','=','u.id')
        ->leftJoin(DB::raw('(SELECT rate_uid, avg(rate_star) AS avg FROM rating GROUP BY rate_uid) AS r'), 'r.rate_uid', '=', 'g.uid')
        ->where('u.status', '=', $status);
        

        if(is_array($service_filter) && !empty($service_filter)){
            $s = Service::WithService($service_filter);
            $ser = array();
            foreach ($s as $_s){
                $ser[] = $_s->giver_id;
            }

            $givers->whereIn('uid',$ser);
        }

        if(is_array($service2_filter) && !empty($service2_filter)){
            $s = Service2::WithService($service2_filter);
            $ser = array();
            foreach ($s as $_s){
                $ser[] = $_s->giver_id;
            }

            $givers->whereIn('uid',$ser);
        }

        if($postcode != ' '){
            $within = Location::getNearBy($postcode, $radius);
            $pos = array($postcode);
            foreach ($within as $w){
                $pos[] = $w->postcode;
            }
            $givers->whereIn('g.postcode', $pos);
        }

        if($gender != 'null'){
            $givers->where('g.gender', '=', $gender);
        }      


        if(($max_rate != 'null') && ($min_rate != 'null')){
            $max = (int)$max_rate;
            $min = (int)$min_rate;
            $givers->where('g.rate','>=',$min)
             ->where('g.rate', '<=', $max);
        }
        if(($min_rating != 'null') && ($min_rate != 'null')){
            $givers->where('r.avg','>=',$min_rating)
                ->where('r.avg','<=',$max_rating);
        }

        $givers->orderBy($order, 'desc');  
        return $givers->paginate(10);
        
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

    public static function searchByName($name){
        $names = explode(" ", $name);
        $givers =  DB::table('giver')
        ->leftJoin('users', 'giver.uid','=','users.id');
        
        foreach ($names as $n){
            $givers->where('users.firstname','LIKE','%'.$n.'%')
            ->orWhere('users.lastname','LIKE','%'.$n.'%');
        }
       
        
        $givers->groupBy('giver.uid')
        ->orderBy('users.created_at', 'desc');
       

        return $givers->paginate(5);
    }

    public static function getTotal(){
        return DB::table('giver')->count();
    }
}
