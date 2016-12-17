<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', [
    'uses' => 'HomeController@testDB',
    'as' => 'test',
    

]);

Route::get('/signup', [
    'uses' => 'HomeController@signup',
    'as' => 'signup',


]);
Route::get('/testing', [
    'uses' => 'HomeController@testing',
    'as' => 'testing',

]);

Route::post('/login', [
    'uses' => 'HomeController@login',
    'as' => 'login',
]);

Route::get('/loginView', [
    'uses' => 'HomeController@loginView',
    'as' => 'loginView',

]);





//Role Admin

Route::get('/registerSchool', [
    'uses' => 'AdminController@getRegisterSchool',
    'as' => 'registerSchool',

]);



//search schools
Route::get('/searchSchool', [
    'uses' => 'HomeController@getSearchSchool',
    'as' => 'searchSchool',

]);

Route::post('/searchSchoolResults', [
    'uses' => 'HomeController@postSearchSchool',
    'as' => 'searchSchoolResults',

]);

//role school

Route::get('/updateVacancies', [
    'uses' => 'SchoolController@getUpdateVacancies',
    'as' => 'updateVacancies',

]);

Route::post('/submitUpdateVacancies', [
    'uses' => 'SchoolController@postUpdateVacancies',
    'as' => 'submitUpdateVacancies',

]);


Route::get('/viewApplicants', [
    'uses' => 'SchoolController@getApplicantList',
    'as' => 'viewApplicants',

]);

Route::post('/viewApplication', [
    'uses' => 'SchoolController@postGetApplication',
    'as' => 'viewApplication',

]);