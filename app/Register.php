<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'registers';

    public function course(){
        return $this->belongsTo('App\Course');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
