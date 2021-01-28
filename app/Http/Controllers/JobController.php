<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Job;
use App\User;
use App\Question;
use App\Answer;
use App\Field;
use App\Candidate;

class JobController extends Controller
{
    public function index()
    {
        return redirect('show');
    }

    public function create()
    {
        $question = new Question;
        return view('/jobs/create' , compact('question'));
    }

    public function show()
    {
        $jobs = Job::all();

        if(Auth::check())
        {
            $id = Auth::id();
        }

        $candidate = Candidate::all();
        return view('/jobs/show', compact('jobs', 'candidate'));
    }

    public function edit($id)
    {
       $job = Job::find($id);
       $ques = $job->questions;

       return view('/jobs/edit' , compact('job', 'ques'));
    }
    
    public function view($id)
    {
        $job = Job::find($id);
        $questions = $job->questions;

        return view('/jobs/view', compact('job', 'questions'));
    }

    public function appliedCandidates($id)
    {
        $candidate = new Candidate();
        $job = Job::find($id);
        $candidates = Candidate::all()->where('job_name', $job->title);

        return view('/jobs/appliedCandidates', compact('job', 'candidates'));
    }

    public function Candidate($id)
    {
        $candidate = Candidate::find($id);
        $job = Job::find($candidate->job_id);
        $questions = $job->questions;
        $answers = $candidate->answers;

        return view('/jobs/candidate', compact('job', 'questions', 'candidate' , 'answers'));
    }

    public function store(Request $request)
    {   
        $job = new Job();
        $job->title = $request->title;
        $job->description = $request->description;
        $job->employment_type = $request->employment_type;
        $job->department = $request->department;
        $job->experience = $request->experience;
        $job->salary = $request->salary;
        $job->save();

        $i='0';
        if(is_null($request->questions[0]))
        {
            return redirect('/show')->with('flash_message', 
            'The '. $job->title.' job is created successfully');
        }
        else
        {
            foreach($request->questions as $qstn)
            {
                $question = new Question();
                $question->question = $qstn;
                $question->field = $request->fields[$i];
                $question->save();
                $job->questions()->save($question);
                $i++;
            }

            return redirect('/show')->with('flash_message', 
            'The '. $job->title.' job is created successfully');
        }
    }

    public function update(Request $request)
    {
      	$job = Job::find($request->update);
		$job->title = $request->title;
        $job->description = $request->description;
        $job->employment_type = $request->employment_type;
        $job->department = $request->department;
        $job->experience = $request->experience;
        $job->salary = $request->salary;
        $job->save();

        $jobs = Job::find($job->id);
        $question = $jobs->questions;
        $candidate = $jobs->candidates;
        $answer = $jobs->answers;
        $question->each->delete();
        $answer->each->delete();
        $candidate->each->delete();


        $i='0';
        if(is_null($request->questions[0]))
        {

        }
        else
        {
            foreach($request->questions as $qstn)
            {
                $question = new Question();
                $question->question = $qstn;
                $question->field = $request->fields[$i];
                $question->save();
                $job->questions()->save($question);
                $i++;
            }
        }

        $user = Auth::user();
        Mail::send('upmail' , ['name' => $user->name , 'job' => $job->title] , function ($message) use ($user)
        {
            $message->to($user->email , $user->name)->subject('Job Applied Successfully');
        });

        return redirect('/show')->with('flash_message', 
        'The '. $job->title.' job is updated successfully');
    }
   
    public function apply(Request $request)
    {
        $request->validate
        ([
            'file'=>'mimes:pdf'
        ]);

        $path = $request->file('file')->storeAs('Resume', $request->title . ' ' . $request->file('file')->getClientOriginalName());

        $job = Job::find($request->apply);
        $questions = $job->questions;

        $candidate = new Candidate();
        $candidate->job_id = $job->id;
        $candidate->job_name = $job->title;
        $candidate->user_id = Auth::user()->id;
        $candidate->candidate_name = Auth::user()->name;
        $candidate->candidate_email = Auth::user()->email;
        $candidate->candidate_cv = $path;
        $candidate->save();

        $user_id = Auth::user()->id;
        $id = Candidate::where('job_name', $job->title)->where('user_id', $user_id)->first();
        $i = 0;

        if(!empty($request->answers[$i]))
        {
            foreach($request->answers as $ansr)
            {
                $answer = new Answer();
                $answer->candidate_id = $id->id;
                $answer->job_id = $job->id;
                $answer->answer = $ansr;
                $answer->save();
                auth()->user()->answers()->save($answer); 
                $questions[$i++]->answers()->save($answer);
            }
        }

        $user = Auth::user();
        Mail::send('mail' , ['name' => $user->name , 'job' => $job->title] , function ($message) use ($user)
        {
            $message->to($user->email , $user->name)->subject('Job Applied Successfully');
        });

        return redirect('/show')->with('flash_message', 
        'Application for job ('. $job->title.') is submitted successfully');
    }
    
    public function destroy($id)
    {
        $job = Job::find($id);
        $candidate = $job->candidates;
        $question = $job->questions;
        $answer = $job->answers;
        
        $candidate->each->delete();
        $answer->each->delete();
        $question->each->delete();
        $job->delete();

        return redirect('show');
    }

    public function jobStatus(Request $request)
    {
        $job = Job::find($request->job_id);
        $job->status = $request->status;
        $job->save();
    }
}
