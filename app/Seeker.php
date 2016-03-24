<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;


class Seeker extends Model implements BillableContract
{	
	use Billable;

    protected $table = 'seeker';
    protected $primaryKey = 'uid';
	protected $dates = ['trial_ends_at', 'subscription_ends_at'];


    public static function getAllSeekers(){
    	return DB::table('seeker')
        ->leftJoin('users', 'seeker.uid','=','users.id')
        ->groupBy('seeker.uid')
        ->orderBy('users.created_at', 'desc')
        ->paginate(5);
    }

    public static function searchByName($name){
        $names = explode(" ", $name);
        $seekers =  DB::table('seeker')
        ->leftJoin('users', 'seeker.uid','=','users.id');
        
        foreach ($names as $n){
            $seekers->where('users.firstname','LIKE','%'.$n.'%')
            ->orWhere('users.lastname','LIKE','%'.$n.'%');
        }
       
        
        $seekers->groupBy('seeker.uid')
        ->orderBy('users.created_at', 'desc');
       

        return $seekers->paginate(5);
    }

    public static function getTotal(){
        return DB::table('seeker')->count();
    }
}
