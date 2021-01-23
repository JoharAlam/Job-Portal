@extends('layouts.app1')

@section('title', '| Applied Candidates')

@section('content')
<!DOCTYPE html>
<html>

    <head>
        <title>Job Portal @yield('title')</title>

        <meta charset=utf-8 />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- For DataTables Functionalities -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css">
        <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        

        <!-- For Button Style -->
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
        
        <!-- For Excel Button -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    </head>

    <style>
        body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
    </style>

    <header class="w3-container w3-center w3-padding-32" style="font-family: cursive;"> 
        <h1><b>Candidates Applied for <span class="w3-tag">{{$job->title}}</span> Job</b></h1>
        <p>Welcome to the Jobs Portal of <span class="w3-tag">GlowLogix</span></p>
    </header>    

    <body class="w3-blue-gray">
        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="col-md-10">
                            <div class="w3-row w3-light-blue" style="width: 1060px; margin-left: 40px;">
                                <div class="w3-card-4 w3-margin w3-white" style="width: 1030px;">
                                    <a href="{{url('/show')}}" title="Go Back" class="w3-margin w3-hover-light-blue btn btn-primary" role="back"><i class="far fa-arrow-alt-circle-left" style="color: black;"></i></a></br>
                                    <div class="card-body w3-margin">
                                        <table id="table_id" class="display nowrap table table-bordered table-striped w3-blue">
                                            <thead>
                                                <tr style="color: black;">
                                                    <th style="text-align: center;">Sr #</th>
                                                    <th style="text-align: center;">Candidate Name</th>
                                                    <th style="text-align: center;">Candidate Email</th>
                                                    <th style="text-align: center;">Job Name</th>
                                                    <th style="text-align: center;">View Details</th>
                                                </tr>
                                            </thead>
                                            <?php $i='0'; ?>
                                            <tbody>
                                                @foreach($candidates as $cndt)
                                                    <?php $i++ ?>
                                                    <tr align="center" style="color: black;">
                                                        <td>{{$i}}</td>
                                                        <td>{{$cndt->candidate_name}}</td>
                                                        <td>{{$cndt->candidate_email}}</td>
                                                        <td>{{$cndt->job_name}}</td>
                                                        <td><a href="{{ url('/job/candidate', $cndt->id) }}" title="View Candidate Details" class="btn btn-info" role="button"><i class="fa fa-eye" style="color: black;"></i></a></td>
                                                    </tr>
                                                @endforeach 
                                            </tbody>

                                            <tfoot>
                                                <tr style="color: black;">
                                                    <th style="text-align: center;">Sr #</th>
                                                    <th style="text-align: center;">Candidate Name</th>
                                                    <th style="text-align: center;">Candidate Email</th>
                                                    <th style="text-align: center;">Job Name</th>
                                                    <th style="text-align: center;">View Details</th>
                                                </tr>
                                            </tfoot>
                                        </table></br>                                    
                                    </div>
                                </div>
                            </div></br></br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script>
        $(document).ready( function () 
        {
            $('#table_id').DataTable({
                //For Showing Excel and CSV button
                // dom: 'Bfrtip',
                // text: 'Export',
                // buttons: ['excelHtml5','csvHtml5']
            });
        });
    </script> 
</html>
@endsection