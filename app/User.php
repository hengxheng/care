<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = array('id');
    protected $fillable = ['firstname', 'lastname', 'user_type', 'phone', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public static function addPic($id, $file){
        $user = User::findorFail($id);
        $pic_name = "p-".$id;
        $pic_path = public_path('images/user');
        $pic_extension = $file->getClientOriginalExtension();
        if($file->move($pic_path, $pic_name.'.'.$pic_extension)){
            $user->picture = $pic_name.'.'.$pic_extension;
        }
        $user->save();
    }

}
