<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CountriesController extends Controller
{
    function list()
    {
    	//return Http::get('https://restcountries.eu/rest/v2/all')->json();

    	$data = Http::get('https://restcountries.eu/rest/v2/all')->json();
    	
    	return view('countries' , ['data' => $data]);

    	// $data = Http::get('https://jsonplaceholder.typicode.com/posts')->json();

    	// return view('profiles' , ['data' => $data]);
    }
}
