<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','provider_id'  ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function course(){
        return $this->hasMany('App\Course');
    }

    public function instructor(){
        return $this->hasOne('App\Instructor');
    }

    public function student(){
        return $this->hasOne('App\Student');
    }

    public function register(){
        return $this->hasMany('App\Register');
    }

}
