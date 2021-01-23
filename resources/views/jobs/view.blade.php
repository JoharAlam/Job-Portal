@extends('layouts.app')

@section('title', '| View Job')

@section('content')
<!DOCTYPE html>
<html>

    <head>
        <title>Job Portal @yield('title')</title>

        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" rel="stylesheet">
    </head>

    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>

    <header align="center" class="w3-container w3-center w3-padding-32" style="font-family: cursive;"> 
        <h1><b>Apply for Job</b></h1>
        <p>Welcome to the Jobs Portal of <span class="w3-tag">GlowLogix</span></p>
    </header>

    <body class="w3-blue-gray">
        <div class="container">
            <div class="row">
                <form action="{{route('apply')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="col-md-10">
                            <div class="w3-row w3-light-blue" style="width: 730px; margin-left: 199.5px;">
                                <div class="w3-card-4 w3-margin w3-white" style="width: 700px; margin-left: 20px;">
                                    <a href="{{url()->previous()}}" title="Go Back" class="w3-margin w3-hover-light-blue btn btn-primary" role="back"><i class="far fa-arrow-alt-circle-left" style="color: black;"></i></a></br>
                                    <img src="{{ asset('storage/job.png') }}" alt="Nature" style="width:100%; height: 300px"></br></br>
                                    <div class="card-body w3-margin ">
                                        <div class="form-group" id="job" style="width: 660px;">
                                            <label for="" > Job</label>
                                            <input style="color: black;" type="text" class="form-control" name="title" value="{{$job->title}}" readonly>
                                            <br>
                                            <label for="" > Department</label>
                                            <input style="color: black;" type="text" class="form-control" name="department" value="{{$job->department}}" readonly>
                                            <br>
                                            <label for="" > Employment Type</label>
                                            <input style="color: black;" type="text" class="form-control" name="employment_type" value="{{$job->employment_type}}" readonly>
                                            <br>
                                            <label for="" > Maximun Experience</label>
                                            <input style="color: black;" type="text" class="form-control" name="experience" value="{{$job->experience}}" readonly>
                                            <br>
                                            <label for="" > Description</label>
                                            <input style="color: black;" type="text" class="form-control" name="description" value="{{$job->description}}" readonly>
                                            <br>
                                            <label for="" > Salary</label>
                                            <input style="color: black;" type="text" class="form-control" name="salary" value="{{$job->salary}}" readonly>
                                            <br>

                                            @if (Auth::user())
                                                <label for="" ><span style="color:red">*</span> CV: Upload CV with your name</label>
                                                <input style="color: black;" type="file" name="file" id="file" required></br>
                                                @foreach($questions as $qstn)
                                                    <h4 style="color: black;" readonly><span style="color:red">*</span><u>Questions:</u> {{$qstn->question}}</h4>
                                                    @if($qstn->field == 'Text Box')
                                                        <input type="text" class="form-control" name="answers[]" placeholder="write your answer.." required>
                                                        </br>
                                                    @endif
                                                    @if($qstn->field == 'Text Area')
                                                        <textarea type="text" class="form-control" name="answers[]" placeholder="write your answer.." required></textarea></br>
                                                    @endif
                                                    @if($qstn->field == 'Gender')
                                                          <pre>              <input type="radio" id="male" name="answers[]" value="Male" required><label for="male"> Male</label>            <input type="radio" id="female" name="answers[]" value="Female" required><label for="female"> Female</label>            <input type="radio" id="other" name="answers[]" value="Other" required><label for="other"> Other</label></pre>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div></br>
                                    </div>
                                </div>
                            </div></br>
                            @if (Auth::user())
                                <div style="margin-left: 530px;">
                                    <button class="btn btn-success" type="submit" name="apply" value="{{$job->id}}">Apply</button></br></br></br>
                                </div>  
                            @endif
                        </div></br>
                    </div> 
                </form>
            </div>
        </div>
        <div class="container" align="center">
            @if(Auth::guest())
                <a href="{{route('login')}}" class="btn btn-primary" type="submit" name="guest">Click Here to Login</a>
                <a href="{{route('register')}}" class="btn btn-primary" type="submit" name="guest">Click Here to Register</a></br></br></br>
            @endif
        </div> 
    </body>
</html>
@endsection