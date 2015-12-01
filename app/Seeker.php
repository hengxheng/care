<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Seeker extends Model
{
    protected $table = 'seeker';
    protected $primaryKey = 'uid';

    public static function getAllSeekers(){
    	return DB::table('seeker')
        ->leftJoin('users', 'seeker.uid','=','users.id')
        ->groupBy('seeker.uid')
        ->get();
    }
}
