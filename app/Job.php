<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function questions()
    {
        return $this->hasMany('App\Question');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function candidates()
    {
        return $this->hasMany('App\Candidate');
    }
}
