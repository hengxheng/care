<?php

namespace App\Handlers\Events;

use App\Events;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Seeker;
use Carbon\Carbon;

class CheckSubscriptionHandler
{
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Events  $event
     * @return void
     */
    public function handle(User $user)
    {

        $now = Carbon::now();
        if($user->user_type == "seeker" ){
            $seeker = Seeker::find($user->id);
            $end_date = $seeker->subscription_ends_at;
            
            if($end_date < $now){
                $seeker->premium = 0;
                $seeker->save();

                $user->status = "Pending";
                $user->save();              
            }
        }
    }
}
