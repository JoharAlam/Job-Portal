@extends('layouts.app')

@section('title', '| Edit Post')

@section('content')
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

    <head>
        <meta charset="UTF-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" rel="stylesheet">
    </head>

    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
        table, th, td {border: 1px solid black}
    </style>

    <header align="center" class="w3-container w3-center w3-padding-32" style="font-family: cursive;"> 
        <h1><b>Candidates Applied for {{$job->title}} Job</b></h1>
        <p>Welcome to the Jobs Portal of <span class="w3-tag">GlowLogix</span></p>
    </header>

    <body class="w3-blue-gray">
        <div class="container">
            <div class="row">
                <form action="{{route('apply')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="col-md-10">
                            <div class="w3-row w3-light-blue" style="width: 1100px;">
                                <div class="w3-card-4 w3-margin w3-white" style="width: 1070px;"></br>
                                    <div class="card-body w3-margin ">
                                        <div class="form-group" id="job" >
                                            <table align="center" class="table table-bordered table-striped" style="width: 100%;">
                                                <tr>
                                                    <th style="text-align: center;">Sr #</th>
                                                    <th style="text-align: center;">Candidate ID</th>
                                                    <th style="text-align: center;">Candidate Name</th>
                                                    <th style="text-align: center;">Candidate Email</th>
                                                    <th style="text-align: center;">Job Name</th>
                                                    <th style="text-align: center;">Job ID</th>
                                                    <th style="text-align: center;">View Details</th>
                                                </tr>

                                                <?php $i = 0?>
                                                @foreach($candidates as $cndt)
                                                    <?php $i++?>
                                                    <tr>
                                                        <td style="text-align: center;">{{$i}}</td>
                                                        <td style="text-align: center;">{{$cndt->id}}</td>
                                                        <td>{{$cndt->candidate_name}}</td>
                                                        <td style="text-align: center;">{{$cndt->candidate_email}}</td>
                                                        <td style="text-align: center;">{{$cndt->job_name}}</td>
                                                        <td style="text-align: center;">{{$cndt->job_id}}</td>
                                                        <td style="text-align: center;"><a href="{{ url('/job/candidate', $cndt->id) }}" title="View Candidate Details" class="btn btn-info" role="button"><i class="fa fa-eye" style="color: black;"></i></a></td>
                                                    </tr>
                                                @endforeach
                                            </table></br>                                           
                                        </div>
                                    </div>
                                </div>
                            </div></br>
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