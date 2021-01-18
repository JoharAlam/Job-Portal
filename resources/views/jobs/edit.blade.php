@extends('layouts.app')

@section('title', '| Create New Post')

@section('content')
<!DOCTYPE html>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" rel="stylesheet">
    </head>

    <style>
      body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>

    <header align="center" class="w3-container w3-padding-32" style="font-family: cursive;"> 
        <h1><b>Create New Job</b></h1>
        <p>Welcome to the Jobs Portal of <span class="w3-tag">GlowLogix</span></p>
    </header>

    <body class="w3-blue-gray">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div> 
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10">
                                <form action="{{url('/job/update')}}" method="POST" >
                                    @csrf
                                    <div class="card">
                                        <div class="w3-row w3-light-blue" style="width: 730px; margin-left: 103.5px;">
                                            <div class="w3-card-4 w3-margin w3-white" style="width: 700px; margin-left: 20px;">
                                                <img src="{{ asset('storage/job.png') }}" alt="Nature" style="width:100%; height: 300px"></br></br>
                                                <div class="card-body">                                
                                                    <div class="form-group" id="job" style="width:660px; margin-left: 20px;">
                                                        <label for="" > Job</label>
                                                        <input type="text" class="form-control" name="title" value="{{$job->title}}" required></br>
                                                        <label for="" > Department</label>
                                                        <input type="text" class="form-control" name="department" value="{{$job->department}}" required><br>
                                                        <label for="employment_type" > Employment Type</label>
                                                        <select id="employment_type" name="employment_type" class=" float-left" value="{{$job->employment_type}}" required>
                                                            @if($job->employment_type == 'Full time')
                                                            <option value="Full time">Full time</option>
                                                            <option value="Part time">Part time</option>
                                                            @endif
                                                            @if($job->employment_type == 'Part time')
                                                            <option value="Part time">Part time</option>
                                                            <option value="Full time">Full time</option>
                                                            @endif

                                                        </select>

                                                        <label for="experience" class=" float-right" style="margin-left: 20px;"> Maximun Experience</label>

                                                        <select id="experience" name="experience" class=" float-right" required>
                                                            @if($job->experience == 'Fresh')
                                                            <option value="Fresh">Fresh</option>
                                                            <option value="Mid Level">Mid Level</option>
                                                            <option value="1 year">1 Year</option>
                                                            <option value="Senior (4 Years)">Senior (4 Years)</option>
                                                            @endif
                                                            @if($job->experience == 'Mid Level')
                                                            <option value="Mid Level">Mid Level</option>
                                                            <option value="Fresh">Fresh</option>
                                                            <option value="1 year">1 Year</option>
                                                            <option value="Senior (4 Years)">Senior (4 Years)</option>
                                                            @endif
                                                            @if($job->experience == '1 Year')
                                                            <option value="1 year">1 Year</option>
                                                            <option value="Fresh">Fresh</option>
                                                            <option value="Mid Level">Mid Level</option>
                                                            <option value="Senior (4 Years)">Senior (4 Years)</option>
                                                            @endif
                                                            @if($job->experience == 'Senior (4 Years)')
                                                            <option value="Senior (4 Years)">Senior (4 Years)</option>
                                                            <option value="Fresh">Fresh</option>
                                                            <option value="Mid Level">Mid Level</option>
                                                            <option value="1 year">1 Year</option>
                                                            @endif

                                                        </select></br></br>

                                                        <label for="" > Description</label>
                                                        <input type="text" class="form-control" name="description" value="{{$job->description}}" required></br>
                                                        <label for="" > Salary</label>
                                                        <input type="text" class="form-control" name="salary" value="{{$job->salary}}" required></br>
                                                        <input id="addQuestion" name="addQuestion" class="btn btn-sm btn-primary float-right" type="button" value="Add Question"></br>
                                                        @foreach($ques as $qstn)
                                                        </br>
                                                        <label for=""><u>Question:</u></label><input type="text" class="form-control" name="questions[]" value="{{$qstn->question}}">
                                                        <label for=""><u>Field:</u></label><input type="text" class="form-control" name="fields[]" value="{{$qstn->field}}"  placeholder="Press 1 for Text Box and 2 for Text Area">
                                                        @endforeach         
                                                    </div><br>
                                                </div>
                                            </div>
                                        </div>
                                        <div align="center">
                                            </br>
                                            <button class="btn btn-success" name="update" value='{{$job->id}}'>Update</button></br></br>
                                        </div>
                                        <script>
                                            $(document).ready(function(){
                                                $('#addQuestion').click(function(){
                                                    $('#job').append('</br><label for=""><u>Question:</u></label><input type="text" name="questions[]" class="form-control">');
                                                    $('#job').append('<label for=""><u>Field:</u></label><input type="text" name="fields[]" placeholder="Press 1 for Text Box and 2 for Text Area" class="form-control">');
                                                });
                                            });
                                        </script>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
@endsection