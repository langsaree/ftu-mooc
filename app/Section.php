<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';

    public function course(){
        return $this->hasMany('App\Course');
    }

    public function lecture(){
        return $this->hasMany('App\Lecture');
    }
}
