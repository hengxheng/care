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
}
