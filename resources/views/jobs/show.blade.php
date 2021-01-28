<?php use App\Candidate; ?>
@extends('layouts.app')

@section('title', '| Show Jobs')

@section('content')

<!DOCTYPE html>
<html>
  
  <head>
    <title>Job Portal @yield('title')</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css" integrity="sha512-9tISBnhZjiw7MV4a1gbemtB9tmPcoJ7ahj8QWIc0daBCdvlKjEA48oLlo6zALYm3037tPYYulT0YQyJIJJoyMQ==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js" integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w==" crossorigin="anonymous"></script>
  </head>

  <style>
    body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
  </style>

  <body class="w3-blue-gray">
    <div class="w3-content" style="max-width:1400px;">
     <header class="w3-container w3-center w3-padding-32" style="font-family: cursive;"> 
        <h1><b>Jobs Portal</b></h1>
        <p>Welcome to the Jobs Portal of <span class="w3-tag">GlowLogix</span></p>
      </header>
    </div>
    
    @foreach($jobs as $i => $job)

      <?php 
        if(empty($candidate) && Auth::guest()){}
        elseif(!empty($candidate) && Auth::user()){
        $id = Candidate::where('job_name', $job->title)->where('user_id', Auth::user()->id)->first(); }
        $user = Auth::user();
      ?>

      <div class="w3-row w3-light-blue" style="margin-left: 370px; width: 731px;">
        <!-- Blog entries -->
        <div class="w3-col l8 s12">
          <!-- Blog entry -->
          <div class="w3-card-4 w3-margin w3-white" style="width: 700px;">
        
            <div class="w3-margin" align="right">
              @if($job->status == '1' && $user->name != 'Admin')
                  <label align="center" title="opened" class="w3-green" style="height: 10%; width: 15%;">Job Opened</label>
              @endif
              @if($job->status == '0' && $user->name != 'Admin')
                  <label align="center" title="closed" class="w3-red" style="height: 10%; width: 15%;">Job Closed</label>
              @endif
            </div>
            <img src="{{ asset('storage/job.png') }}" alt="Nature" style="width:100%; height: 300px">
            <div class="w3-container">
              <h3><b>Title: <u>{{ $job->title }}</u></a></h3>
              <h5>Department: <u>{{ $job->department}}</u></h5>
              <h5>Enployment Type: <u>{{ $job->employment_type}}</u></h5>
              <h5>Experience: <u>{{ $job->experience}}</u></h5>
              <h5>Salary: <u>{{ $job->salary}}</u></h5>
              <h5>Upload Date: {{ $job->created_at }}</h5>
            </div><hr>

            <div class="w3-container" class="teaser">
              <p><b><u>Description:</u> {{  Str::limit($job->description, 100) }} {{-- Limit teaser to 100 characters --}}</b></p><hr>
              <div class="w3-row" >
                <div class="w3-col m14 s12">
                  
                  @if(!empty($id))
                    <button title="Your are already applied for this job" class="btn btn-success" type="button" style="background-color: green;" disabled>Applied <i class="far fa-file-alt"></i></button>
                  @endif
                  @if(empty($id) || $user->name == 'Admin')
                    <a href="{{ url('/jobs/view', $job->id) }}" title="View Job Details" class="btn btn-success" role="button"><i class="fa fa-eye" style="color:black;" ></i></a>
                  @endif
                  @canany(['Administer roles & permissions' , 'Show Candidates']) 
                  <a href="{{ url('/jobs/appliedCandidates', $job->id) }}" title="View Applied Candidates" class="btn btn-info" role="button"><i class="fa fa-users" style="color: black;"></i></a>
                  @endcanany
                  @canany(['Administer roles & permissions' , 'Delete Job'])
                  <a href="{{ url('/job/delete', $job->id) }}" title="Delete Job" class="btn btn-danger" role="button"><i class="fas fa-trash-alt" style="color: black;"></i></a>
                  @endcanany
                  @canany(['Administer roles & permissions' , 'Edit Job'])
                  <a href="{{ url('/job/edit', $job->id) }}" title="Edit Job" class="btn btn-warning" role="button"><i class="fas fa-edit" style="color: black;"></i></a>
                  @endcanany
                </div>
                <div align="center">
                  <label > Status</label></br>
                  <input data-id="{{$job->id}}" name="job_status" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Open" data-off="Close" {{ $job->status ? 'checked' : ''}}>
                </div>                            
              </div></br>
            </div>
          </div>
        </div>
      </div></br>
    @endforeach
  </body>
  <script>
    $('.toggle-class').change(function()
    {
      var status =  $(this).prop('checked') == true ? 1 : 0;
      var job_id = $(this).data('id');

      $.ajax(
      {
        type: "GET",
        dataType: "json",
        url: '/changeStatus',
        data: {'status': status , 'job_id': job_id}
      });

      //alert('Job status updated successfully');
    });
  </script>
</html>
@endsection
