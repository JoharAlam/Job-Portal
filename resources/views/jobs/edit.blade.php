@extends('layouts.app')

@section('title', '| Edit Job')

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

        .switch {position: relative; display: inline-block; width: 50px; height: 22px;}

        .switch input {opacity: 0; width: 0; height: 0;}

        .slider {position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #ccc; -webkit-transition: .4s; transition: .4s;}

        .slider:before {position: absolute; content: ""; height: 15px; width: 15px; left: 4px; bottom: 4px; background-color: white; -webkit-transition: .4s; transition: .4s;}

        input:checked + .slider {background-color: #2196F3;}

        input:focus + .slider {box-shadow: 0 0 1px #2196F3;}

        input:checked + .slider:before {-webkit-transform: translateX(26px);-ms-transform: translateX(26px);transform: translateX(26px);}

        /* Rounded sliders */
        .slider.round {border-radius: 34px;}

        .slider.round:before {border-radius: 50%;}
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
                                                <a href="{{url()->previous()}}" title="Go Back" class="w3-margin w3-hover-light-blue btn btn-primary" role="back"><i class="far fa-arrow-alt-circle-left" style="color: black;"></i></a></br>
                                                <img src="{{ asset('storage/job.png') }}" alt="Nature" style="width:100%; height: 300px"></br></br>
                                                <div class="card-body">                                
                                                    <div class="form-group" id="job" style="width:660px; margin-left: 20px;">
                                                        <div align="center">
                                                            <label > Status</label></br>
                                                            @if($job->status == '1')
                                                                <label class="switch">
                                                                  <input type="checkbox" class="form-control form-group" value="1" name="status" checked>
                                                                  <span class="slider round"></span>
                                                                </label></br>
                                                            @endif
                                                            @if($job->status == '0')
                                                                <label class="switch">
                                                                  <input type="checkbox" class="form-control form-group" value="1" name="status">
                                                                  <span class="slider round"></span>
                                                                </label></br>
                                                            @endif
                                                        </div>
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

                                                        <!-- For adding Anything dynamically OLD Procedure -->
                                                        <!-- <input id="addQuestion" name="addQuestion" class="btn btn-sm btn-primary float-right" type="button" value="Add Question"></br> -->

                                                        <!-- For adding anything dynamically New Procedure -->
                                                        <div class="input_fields_wrap">
                                                            <button class="btn btn-sm btn-primary float-right add_field_button">Add Question</button>
                                                        </div>

                                                        @foreach($ques as $qstn)
                                                            </br>
                                                            <div class="input_old_fields_wrap">
                                                            <a href="#" class="remove_old_field">Remove</a></br>
                                                            <label for=""><u>Question:</u></label><input type="text" class="form-control" name="questions[]" value="{{$qstn->question}}">
                                                            </br>

                                                            <select id="field[]" name="fields[]" class="form-control float-right" required>
                                                                @if($qstn->field == 'Text Box')
                                                                    <option value="Text Box">Text Box</option>
                                                                    <option value="Text Area">Text Area</option>
                                                                    <option value="Gender">Gender</option>
                                                                @endif
                                                                @if($qstn->field == 'Text Area')
                                                                    <option value="Text Area">Text Area</option>
                                                                    <option value="Text Box">Text Box</option>
                                                                    <option value="Gender">Gender</option>
                                                                @endif
                                                                @if($qstn->field == 'Gender')
                                                                    <option value="Gender">Gender</option>
                                                                    <option value="Text Area">Text Area</option>
                                                                    <option value="Text Box">Text Box</option>
                                                                @endif
                                                            </select>
                                                            </div>
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

                                            // To Add anything dynamically on button click //OLD Procedure
                                            // $(document).ready(function(){
                                            //     $('#addQuestion').click(function(){
                                            //         $('#job').append('</br><label for=""><u>Question:</u></label><input type="text" name="questions[]" class="form-control"></br>');
                                            //         $('#job').append('<select id="experience" name="fields[]" class="form-control float-right" style="color:black;" required><option value="" style="color: black;">Choose Field</option><option value="Text Box">Text Box</option><option value="Text Area">Text Area</option><option value="Gender">Gender</option></select>');
                                            //     });
                                            // });

                                            // To add and remove anything dynamically on button click //NEW Procedure
                                            $(document).ready(function() 
                                            {
                                                // Assigning div and button class to variables for add and remove process
                                                var wrapper         = $(".input_fields_wrap");
                                                var add_button      = $(".add_field_button");
                                                var wrapper1         = $(".input_old_fields_wrap");

                                                //on add button click
                                                $(add_button).click(function(e)
                                                {
                                                    e.preventDefault();

                                                    // Adding Fields 
                                                    $(wrapper).append('<div></br><a href="#" class="remove_field">Remove</a></br><label for=""><u>Question:</u></label><input type="text" name="questions[]" class="form-control"/></br><select id="experience" name="fields[]" class="form-control float-right" style="color:black;" required><option value="" style="color: black;">Choose Field</option><option value="Text Box">Text Box</option><option value="Text Area">Text Area</option><option value="Gender">Gender</option></select></div>');
                                                });

                                                // on remove button click
                                                $(wrapper).on("click",".remove_field", function(e)
                                                {
                                                    e.preventDefault();

                                                    // Deleting Fields 
                                                    $(this).parent('div').remove();
                                                });
                                                $(wrapper1).on("click",".remove_old_field", function(e)
                                                {
                                                    e.preventDefault();

                                                    // Deleting Fields 
                                                    $(this).parent('div').remove();
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