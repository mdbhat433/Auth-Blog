<?php

namespace App;


use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Eloquent as Model;
 //use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable  as AuthenticatableTrait;
use Illuminate\Auth\Passwords\CanResetPassword;

//use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

// use Jenssegers\Mongodb\Auth\User as Authenticatable;

// class User extends Authenticatable
class User extends Eloquent implements Authenticatable,CanResetPasswordContract


{
    
    use Notifiable, AuthenticatableTrait,CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
