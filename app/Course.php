<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

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

    public function user(){
        return $this->belongsTo('App\User');
    }


}
