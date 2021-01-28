<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/show');
});

Auth::routes();

Route::get('/home', 'JobController@index')->name('home');
Route::get('/show', 'JobController@show')->name('show');
Route::get('/job/candidate/{id}', 'JobController@Candidate')->name('candidate');
Route::get('/jobs/appliedCandidates/{id}', 'JobController@appliedCandidates')->name('appliedCandidates');
Route::get('/jobs/view/{id}', 'JobController@view')->name('view');
Route::post('/jobs/apply', 'JobController@apply')->name('apply');
Route::get('/job/delete/{id}', 'JobController@destroy')->name('delete');
Route::get('/job/edit/{id}', 'JobController@edit')->name('edit');
Route::post('/job/update', 'JobController@update')->name('update');
Route::get('/changeStatus', 'JobController@jobStatus')->name('changeStatus');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('jobs', 'JobController');

//Route for API Functionality

Route::get('countries', "CountriesController@list");

