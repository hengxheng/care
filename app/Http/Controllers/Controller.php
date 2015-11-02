<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use App\User;
use App\Seeker;
use App\Giver;
use View;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function __construct(){
        $this->middleware('auth');

        if(Auth::check()){
        	$id = Auth::user()->id;
        	$type = Auth::user()->user_type;


        	if($type == "seeker"){
        		$user_info = Seeker::find($id);
        	}
        	elseif ($type == "giver"){
        		$user_info = Giver::find($id);
        	}


        	View::share('user_info', $user_info);
        }
    }
}
