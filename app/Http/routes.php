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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [
    'uses' => 'HomeController@getWelcome',
    'as' => 'welcome',


]);

//Route::get('/', [
//    'uses' => 'HomeController@testDB',
//    'as' => 'welcome',
//
//
//]);

//Route::get('/test', [
//    'uses' => 'HomeController@testDB',
//    'as' => 'test',
//
//
//]);

Route::post('/signUp', [
    'uses' => 'HomeController@signUp',
    'as' => 'signUp',
]);

Route::get('/signUp', [
    'uses' => 'HomeController@signUpView',
    'as' => 'signUpView',

]);



Route::get('/testing', [
    'uses' => 'HomeController@testing',
    'as' => 'testing',

]);
Route::get('/dashboard', [
    'uses' => 'HomeController@getDashboard',
    'as' => 'getDashboard',
    'middleware' => 'auth'
]);

Route::post('/login', [
    'uses' => 'HomeController@login',
    'as' => 'login',
]);

Route::get('/login', [
    'uses' => 'HomeController@loginView',
    'as' => 'loginView',

]);

Route::get('/logout', [
    'uses' => 'HomeController@logout',
    'as' => 'logout',

]);





//Role Admin







//search schools
Route::get('/searchSchool', [
    'uses' => 'HomeController@getSearchSchool',
    'as' => 'searchSchool',

]);

Route::post('/searchSchoolResults', [
    'uses' => 'HomeController@postSearchSchool',
    'as' => 'searchSchoolResults',

]);
Route::group(['middleware' => ['web']], function () {
////////admin
    Route::get('/registerSchool', [
        'uses' => 'AdminController@getRegisterSchoolView',
        'as' => 'registerSchoolView',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::post('/registerSchool', [
        'uses' => 'AdminController@registerSchool',
        'as' => 'registerSchool',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::get('/manageSession', [
        'uses' => 'AdminController@getManageSession',
        'as' => 'manageSession',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::post('/submitManageSession', [
        'uses' => 'AdminController@postManageSession',
        'as' => 'submitManageSession',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::get('/deactivateSession', [
        'uses' => 'AdminController@getDeactivateSession',
        'as' => 'deactivateSession',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\AdminMiddleware::class);

    Route::get('/evaluateResults', [
        'uses' => 'AdminController@getEvaluateResults',
        'as' => 'evaluateResults',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\AdminMiddleware::class);
    ////////////student_controller
    Route::get('/getApplicant', [
        'uses' => 'StudentController@getApplicant',
        'as' => 'getApplicant',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);
    Route::post('/submitApplicant', [
        'uses' => 'StudentController@postApplicant',
        'as' => 'submitApplicant',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);

    Route::get('/getApplicantGuardian', [
        'uses' => 'StudentController@getApplicantGuardian',
        'as' => 'getApplicantGuardian',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);
    Route::post('/submitApplicantGuardian', [
        'uses' => 'StudentController@postApplicantGuardian',
        'as' => 'submitApplicantGuardian',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);
    Route::get('/getApplicantPriority', [
        'uses' => 'StudentController@getApplicantPriority',
        'as' => 'getApplicantPriority',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);
    Route::post('/submitApplicantPriority', [
        'uses' => 'StudentController@postApplicantPriority',
        'as' => 'submitApplicantPriority',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);
    Route::get('/getGuardianPastPupil', [
        'uses' => 'StudentController@getGuardianPastPupil',
        'as' => 'getGuardianPastPupil',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);
    Route::post('/submitGuardianPastPupil', [
        'uses' => 'StudentController@postGuardianPastPupil',
        'as' => 'submitGuardianPastPupil',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);

    Route::get('/getApplicantSibling', [
        'uses' => 'StudentController@getApplicantSibling',
        'as' => 'getApplicantSibling',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);
    Route::post('/submitApplicantSibling', [
        'uses' => 'StudentController@postApplicantSibling',
        'as' => 'submitApplicantSibling',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);

    //role school

    Route::get('/updateVacancies', [
        'uses' => 'SchoolController@getUpdateVacancies',
        'as' => 'updateVacancies',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\SchoolMiddleware::class);

    Route::post('/submitUpdateVacancies', [
        'uses' => 'SchoolController@postUpdateVacancies',
        'as' => 'submitUpdateVacancies',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\SchoolMiddleware::class);


    Route::get('/viewApplicants', [
        'uses' => 'SchoolController@getApplicantList',
        'as' => 'viewApplicants',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\SchoolMiddleware::class);

    Route::post('/submitViewApplicants', [
        'uses' => 'SchoolController@postApplicantList',
        'as' => 'submitViewApplicants',
        'middleware' => 'auth'
    ])->middleware(App\Http\Middleware\SchoolMiddleware::class);

    Route::post('/viewApplication', [
        'uses' => 'SchoolController@postGetApplication',
        'as' => 'viewApplication',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\SchoolMiddleware::class);



});







