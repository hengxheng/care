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
    public function create($id)
    {
        // $method = Request::method();
     
        if (!empty($_POST)){

        }
        else{
            return view('seeker.create', compact('id'));
        }
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


        if(Input::file('picture')){
            $pic_name = "photo-".$uid;
            $pic_path = public_path('images/user');
            $pic_extension = Input::file('picture')->getClientOriginalExtension();
            if(Input::file('picture')->move($pic_path, $pic_name.'.'.$pic_extension)){
                $seeker->picture = $pic_name.'.'.$pic_extension;
            }
        }
        $seeker->save();

        // $user = new User;
        // $user = User::findorFail($uid);
        // $user->status = "Active";
        // $user->save();


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

        return Redirect::route('care_seekers.show',array('uid'=>$id));

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
        if(Input::file('picture')){
            $pic_name = "photo-".$id;
            $pic_path = public_path('images/user');
            $pic_extension = Input::file('picture')->getClientOriginalExtension();
            if(Input::file('picture')->move($pic_path, $pic_name.'.'.$pic_extension)){
                $seeker->picture = $pic_name.'.'.$pic_extension;
            }
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
