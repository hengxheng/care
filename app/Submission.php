<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table = "submission";

    public static function getSubmissionByJob($jid){
    	$sub = DB::table('job AS jo')
    		->leftJoin('submission AS su','su.job_id','=', 'jo.id')
    		->leftJoin('users AS u','su.submited_uid','=', 'u.id' )
    		->select('su.*','u.firstname','u.lastname','u.picture','u.id AS uid')
    		->where('job_id','=', $jid)
    		->groupBy('u.id')
    		->paginate(10);
    	return $sub;
    }

    public static function checkSubmitted($uid, $jid){
    	$submitted = false;
    	$sub = DB::table('submission')
    			->where('submited_uid', '=', $uid)
    			->where('job_id', '=', $jid)
    			->count();
    	if($sub > 0){
    		$submitted = true;
    	}
    	return $submitted;
    }

    public static function getSubmissionByUser($uid){
    	return Submission::where('submited_uid','=',$uid);
    }
}
