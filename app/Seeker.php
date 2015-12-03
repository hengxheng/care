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
        ->get();
    }
}
