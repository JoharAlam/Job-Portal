@extends('layouts.app')

@section('title', 'Countries Rest Api')

@section('content')

<!DOCTYPE html>
<html lang="en-US">

	<head>
		<title>@yield('title')</title>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	</head>
		
	<style>
		body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
	</style>

  	<body class="w3-blue-gray">
		<div class="w3-row  w3-margin">
		    @foreach($data as $country)
		      	<div class="w3-col w3-margin w3-light-blue" style="width: 450px; height: 513px;"> <!--  -->
		          	<div class="w3-card-4 w3-margin w3-blue-gray" style="width: 420px;">
						<img src="{{ $country['flag'] }}" alt="Flags" style=" margin-left:; width:420px; height: 200px">
						<div class="w3-container"><hr>
							<h4><b><u>Country</u>: {{ $country['name'] }}</a></b></h4>
							<h4><b><u>Short Abrivation</u>: {{ $country['alpha2Code'] }}</a></b></h4>
							<h4><b><u>Long Abrivation</u>: {{ $country['alpha3Code'] }}</a></b></h4>
							<h4><b><u>Region</u> : {{ $country['region'] }}</a></b></h4>
							<h4><b><u>Demonym</u> : {{ $country['demonym'] }}</a></b></h4>
							<h4><b><u>Area</u> : {{ $country['area']}}</a></b></h4>
							<h4><b><u>Population</u> : {{ $country['population']}}</a></b></h4>
						</div><hr>
		          	</div>
		      	</div>
		    @endforeach
		</div></br></br>
		
	</body>
</html>
@endsection
