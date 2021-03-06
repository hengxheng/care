<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use App\User;
use App\Seeker;
use Redirect;
use Carbon\Carbon;
use Mail;
use Auth;
use Session;

class SeekersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('seeker.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $uid = Input::get('uid');

        $seeker = new Seeker;
        $seeker->uid = $uid;

        $seeker->address1 = Input::get('address1');
        $seeker->address2 = Input::get('address2');
        $seeker->state = Input::get('state');
        $seeker->suburb = Input::get('suburb');
        $seeker->postcode = Input::get('postcode');

        $seeker->save();

        $file = Input::file('picture');
        if($file){
            User::addPic($uid, $file);
        }
       

        $user = new User;
        $user = User::findorFail($uid);
        $user->status = "Pending";
        $user->save();


        return Redirect::route('seeker.signup');

    }

    public function signup(){
        return view('seeker.signup');
    }
    
    //pay to upgrade via Stripe
    public function upgrade(Request $request){
        Seeker::setStripeKey("sk_test_wRuhjbZ3DfAaPzMYUWc1DzHP");
        $id = Input::get('uid');
        $seeker = Seeker::findorFail($id);

        $plan = Input::get('subscription');
        $seeker->subscription($plan)->create( Input::get('stripeToken'));
        if($plan == "004"){
            $seeker->subscription_ends_at = Carbon::now()->addDays(365);
        }
        elseif($plan == "003"){
            $seeker->subscription_ends_at = Carbon::now()->addDays(180);
        }
        elseif($plan == "002"){
            $seeker->subscription_ends_at = Carbon::now()->addDays(90);
        }
        $seeker->premium = 1;
        $seeker->save();

        $user = new User;
        $user = User::findorFail($id);
        $user->status = "Active";
        $user->save();

        $fname = $user->firstname;
        $lname = $user->lastname;
        $hmail = $user->email;
        
        Mail::send('emails.welcome',array('firstname' => $fname, 'lastname' => $lname, 'email' => $hmail ), function($message) use ($hmail) {
            $message->to($hmail , "CareNation Customer")->subject('Thanks for joining CareNation.com.au!');
        });

        $admin_email = "info@carenation.com.au";
        Mail::send('emails.cs_signup_notice',array('firstname' => $fname, 'lastname' => $lname, 'email' => $admin_email ), function($message) use ($admin_email) {
            $message->to($admin_email , "CareNation")->subject('A new Care Seeker has signed up to CareNation');
        });

        return Redirect::route('care_seekers.show',array('uid'=>$id));

    }

    public function cancel(){
        Seeker::setStripeKey("sk_test_wRuhjbZ3DfAaPzMYUWc1DzHP");
        if(Input::get("cancel-subscription")){
            $id = Auth::user()->id;
            $seeker = Seeker::findorFail($id);
            $seeker->subscription()->cancel();
        }

        // $subscribed = $seeker->subscribed();
        Session::flash('message', 'Your subscription has been cancelled');
        return Redirect::back();
        
    }

    public function manageSubscription(){
        Seeker::setStripeKey("sk_test_wRuhjbZ3DfAaPzMYUWc1DzHP");
        $id = Auth::user()->id;
        $seeker = Seeker::findorFail($id);
        $subscribed = $seeker->subscribed();

        return view('seeker.payment', compact('subscribed', 'seeker'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $the_user = User::find($id);
        $the_seeker = Seeker::find($id);

        return view('seeker.show', compact(array('the_user', 'the_seeker')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $seeker = Seeker::findorFail($id);
        return view('seeker.edit', compact(array('seeker')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {

        
        $seeker = Seeker::findorFail($id);
        
        if(Input::get('address1')){
            $seeker->address1 = Input::get('address1');
        }
        if(Input::get('address2')){
            $seeker->address2 = Input::get('address2');
        }
        if(Input::get('state')){
            $seeker->state = Input::get('state');
        }
        if(Input::get('suburb')){
            $seeker->suburb = Input::get('suburb');
        }
        if(Input::get('postcode')){
            $seeker->postcode = Input::get('postcode');
        }
        
        $file = Input::file('picture');       
        if($file){
            User::addPic($id, $file);
        }

        $seeker->save();
        return Redirect::route('care_seekers.show',array('uid'=>$id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    
}
