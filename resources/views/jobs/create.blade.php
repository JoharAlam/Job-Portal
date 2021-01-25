@extends('layouts.app')

@section('title', '| Create New Job')

@section('content')
<!DOCTYPE html>
<html>

    <head>
        <title>Job Portal @yield('title')</title>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
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
                                <form action="{{route('jobs.store')}}" method="POST" >
                                    @csrf
                                    <div class="card">
                                        <div class="w3-row w3-light-blue" style="width: 730px; margin-left: 103.5px;">
                                            <div class="w3-card-4 w3-margin w3-white" style="width: 700px; margin-left: 20px;">
                                                <img src="{{ asset('storage/job.png') }}" alt="Nature" style="width:100%; height: 300px"></br></br>
                                                <div class="card-body">                                
                                                    <div class="form-group" id="job" style="width:660px; margin-left: 20px;">
                                                        <label for="" > Job</label>
                                                        <input type="text" class="form-control" name="title" required></br>
                                                        <label for="" > Department</label>
                                                        <input type="text" class="form-control" name="department" required><br>
                                                        <label for="employment_type" > Employment Type</label>
                                                        <select id="employment_type" name="employment_type" class=" float-left" required>
                                                            <option value="">choose..</option>
                                                            <option value="Full time">Full time</option>
                                                            <option value="Part time">Part time</option>
                                                        </select>

                                                        <label for="experience" class=" float-right" style="margin-left: 20px;"> Maximun Experience</label>

                                                        <select id="experience" name="experience" class=" float-right" required>
                                                            <option value="">choose..</option>
                                                            <option value="Fresh">Fresh</option>
                                                            <option value="Mid Level">Mid Level</option>
                                                            <option value="1 year">1 Year</option>
                                                            <option value="Senior (4 Years)">Senior (4 Years)</option>
                                                        </select></br></br>

                                                        <label for="" > Description</label>
                                                        <input type="text" class="form-control" name="description" required></br>
                                                        <label for="" > Salary</label>
                                                        <input type="text" class="form-control" name="salary" required></br>
                                                        <input id="addQuestion" name="addQuestion" class="btn btn-sm btn-primary float-right" type="button" value="Add Question"></br>             
                                                    </div><br>    
                                                </div>
                                            </div>
                                        </div>
                                        <div align="center">
                                            </br>
                                            <button class="btn btn-success" name="count" value='1'>Save</button></br></br>
                                        </div>
                                        <script>
                                            $(document).ready(function(){
                                                $('#addQuestion').click(function(){
                                                    $('#job').append('</br><label for=""><u>Question:</u></label><input type="text" name="questions[]" class="form-control"></br>');
                                                    $('#job').append('<select id="experience" name="fields[]" class="form-control float-right" style="color:black;" required><option value="" style="color: black;">Choose Field</option><option value="Text Box">Text Box</option><option value="Text Area">Text Area</option><option value="Gender">Gender</option></select>');
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