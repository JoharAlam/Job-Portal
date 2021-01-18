<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'question', 'field', 'job_id'
    ];

    public function jobs()
    {
        return $this->belongsTo('App\Job');
    }
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }
}
