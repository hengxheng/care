<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = "job";

    public static function getSubmitedJobs($uid){
    	return DB::table('submission')
    			->leftJoin('job','submission.job_id','=', 'job.id')
    			->where('submission.submited_uid','=',$uid)
    			->groupBy('job.id')
    			->paginate(10);
    } 

    public static function getAllSuburbs($state){
        return DB::table('job')
        ->select('suburb')
        ->where('state', '=', $state)
        ->groupBy('suburb')
        ->get();
    }

    public static function search($state="null", $suburb="null", $services=array(), $order="start_date",$status){
    	$jobs = DB::table('job')
    		->where('status', '=', $status );

    	if($state != "null"){
    		$jobs->where('state', '=', $state);
    	}
    	if($suburb != 'null'){
            $jobs->where('suburb','=', $suburb);
        }
        if(!empty($services)){
        	// foreach ($services as $s){
        		$jobs->where("service_name", "LIKE", '%'.$services[0].'%');
        	// }
        }
        $jobs->orderBy($order, 'desc');
        return $jobs->paginate(10);
    }

}
