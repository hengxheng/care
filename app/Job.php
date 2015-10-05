<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = "job";

    public static function getSubmitedJob($uid){
    	return DB::table('submission')
    			->leftJoin('job','submission.job_id','=', 'job.id')
    			->where('submission.submited_uid','=',$uid)
    			->groupBy('job.id')
    			->get();
    } 
}
