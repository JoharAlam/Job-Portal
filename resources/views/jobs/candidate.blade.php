@extends('layouts.app')

@section('title', '| Candidate')

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
        <h1><b>Candidate Details for <span class="w3-tag">{{$job->title}}</span> Job</b></h1>
        <p>Welcome to the Jobs Portal of <span class="w3-tag">GlowLogix</span></p>
    </header>

    <body class="w3-blue-gray">
        <div class="container">
            <div class="row">
                @csrf
                <div class="card">
                    <div class="col-md-10">
                        <div class="w3-row w3-light-blue" style="width: 1100px; margin-left: 18px;">
                            <div class="w3-card-4 w3-margin w3-white" style="width: 1070px;">
                                <a href="{{url()->previous()}}" title="Go Back" class="w3-margin w3-hover-light-blue btn btn-primary" role="back"><i class="far fa-arrow-alt-circle-left" style="color: black;"></i></a>
                                <div class="card-body w3-margin ">
                                    <div class="form-group" id="job" style="width: 1050px;">
                                        <h3 align="center" style="line-height: 40px;">
                                            <label name="id" > <u>Candidate ID</u> : {{$candidate->id}}</label></br>
                                            <label name="candidate_name" > <u>Candidate Name</u> : {{$candidate->candidate_name}}</label></br>
                                            <label name="candidate_email" > <u>Candidate Email</u> : {{$candidate->candidate_email}}</label></br>
                                            <label name="title" > <u>Job Name</u> : {{$job->title}}</label>
                                        </h3>
                                        </br>
                                        <table align="center" class="table table-striped w3-card-4" style="border-style: solid; border-color: black; width: 98%; margin-right: 15px;">

                                            <tr style="border-style: dashed; border-color: black; background-color: grey;">
                                                <th style="text-align: center;"><h5><b><u>Questions</u></b></h5></th>
                                            </tr>

                                            <?php $q = 0 ?>
                                            @foreach($questions as $qstn)
                                                <?php $q++ ?>
                                                <tr>
                                                    <td style="color: black; line-height: 40px;" readonly><h5><u><b>Questions {{$q}}</u>:</b> {{$qstn->question}}</h5></td>
                                                </tr>
                                            @endforeach

                                            <tr style="border-style: dashed; border-color: black; background-color: grey;">
                                                <th style="text-align: center;"><h5><b><u>Answers</u></b></h5></th>
                                            </tr>

                                            <?php $a = 0 ?>
                                            @foreach($answers as $ans)
                                                <?php $a++ ?>
                                                <tr>
                                                    <td style="color: black;" readonly><h5><b><u>Answer {{$a}}</u>:</b> {{$ans->answer}}</h5></td>
                                                </tr>
                                            @endforeach
                                        </table></br>
                                    </div>
                                </div>
                            </div>
                        </div></br>
                    </div></br>
                </div> 
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