<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculties';

    public function course()
    {
        return $this->hasOne('App\Course');
    }


}
