<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $table = 'lectures';

    public function section(){
        return $this->belongsTo('App\Section');
    }
}
