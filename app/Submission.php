<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $table = "submission";

    public static function getSubmissionByJob($jid){
    	return Submission::where('job_id','=', $jid);
    }

    public static 
    function getSubmissionByUser($uid){
    	return Submission::where('submited_uid','=',$uid);
    }
}
