<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table ='students';

    public function user(){
        return $this->hasMany('App\User');
    }
    public function faculty(){
        return $this->belongsTo('App\Faculty');
    }

    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function section(){
        return $this->belongsTo('App\Section');
    }

    public function register(){
        return $this->hasMany('App\Register');
    }





}
