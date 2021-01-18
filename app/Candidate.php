<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
	protected $fillabale = 
	[
		'job_id', 'job_name', 'user_id', 'candidate_name', 'candidate_email', 'candidate_cv',
	];

	public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }
}
