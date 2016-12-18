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

Route::post('/submitViewApplicants', [
    'uses' => 'SchoolController@postApplicantList',
    'as' => 'submitViewApplicants',
]);

Route::post('/viewApplication', [
    'uses' => 'SchoolController@postGetApplication',
    'as' => 'viewApplication',

]);

////////////student_controller
Route::get('/getApplicant', [
    'uses' => 'StudentController@getApplicant',
    'as' => 'getApplicant',

]);
Route::post('/submitApplicant', [
    'uses' => 'StudentController@postApplicant',
    'as' => 'submitApplicant',

]);

Route::get('/getApplicantGuardian', [
    'uses' => 'StudentController@getApplicantGuardian',
    'as' => 'getApplicantGuardian',

]);
Route::post('/submitApplicantGuardian', [
    'uses' => 'StudentController@postApplicantGuardian',
    'as' => 'submitApplicantGuardian',

]);
Route::post('/getApplicantPriority', [
    'uses' => 'StudentController@getApplicantPriority',
    'as' => 'getApplicantPriority',

]);
Route::post('/submitApplicantPriority', [
    'uses' => 'StudentController@postApplicantPriority',
    'as' => 'submitApplicantPriority',

]);
Route::post('/getApplicantSibiling', [
    'uses' => 'StudentController@getApplicantSibiling',
    'as' => 'getApplicantSibiling',

]);
Route::post('/submitApplicatntSibiling', [
    'uses' => 'StudentController@postApplicantSibiling',
    'as' => 'submitApplicantSibiling',

]);