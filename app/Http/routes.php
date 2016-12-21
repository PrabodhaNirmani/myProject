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

    /////alll
    Route::get('/viewResults', [
        'uses' => 'homeController@getViewResults',
        'as' => 'viewResults',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\Middleware::class);




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

    Route::post('/adminViewResults', [
        'uses' => 'homeController@postAdminViewResults',
        'as' => 'adminViewResults',
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

//edit application routes
    Route::get('/getEditApplication', [
        'uses' => 'StudentController@getEditApplication',
        'as' => 'getEditApplication',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);

    Route::post('/postEditApplication', [
        'uses' => 'StudentController@postEditApplication',
        'as' => 'postEditApplication',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);

    Route::get('/getEditApplicantGuardian', [
        'uses' => 'StudentController@getEditApplicantGuardian',
        'as' => 'getEditApplicantGuardian',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);

    Route::post('/postEditApplicantGuardian', [
        'uses' => 'StudentController@postEditApplicantGuardian',
        'as' => 'postEditApplicantGuardian',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);

    Route::get('/getEditApplicantPriority', [
        'uses' => 'StudentController@getEditApplicantPriority',
        'as' => 'getEditApplicantPriority',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);

    Route::post('/postEditApplicantPriority', [
        'uses' => 'StudentController@postEditApplicantPriority',
        'as' => 'postEditApplicantPriority',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);
    Route::get('/getEditGuardianPastPupil', [
        'uses' => 'StudentController@getEditGuardianPastPupil',
        'as' => 'getEditGuardianPastPupil',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);

    Route::post('/postEditGuardianPastPupil', [
        'uses' => 'StudentController@postEditGuardianPastPupil',
        'as' => 'postEditGuardianPastPupil',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);

    Route::get('/getEditApplicantSibling', [
        'uses' => 'StudentController@getEditApplicantSibling',
        'as' => 'getEditApplicantSibling',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);

    Route::post('/postEditApplicantSibling', [
        'uses' => 'StudentController@postEditApplicantSibling',
        'as' => 'postEditApplicantSibling',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\StudentMiddleware::class);





    /////////////////////role school

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

    Route::get('/reviewApplication/{applicant_id}', [

        'uses' => 'SchoolController@reviewApplication1',
        'as' => 'reviewApplication1',
        'middleware' => 'auth'
    ])->middleware(App\Http\Middleware\SchoolMiddleware::class);
    

    Route::get('/reviewApplication/2/{applicant_id}', [

        'uses' => 'SchoolController@reviewApplication2',
        'as' => 'reviewApplication2',
        'middleware' => 'auth'
    ])->middleware(App\Http\Middleware\SchoolMiddleware::class);

    Route::get('/reviewApplication/2/3/{applicant_id}', [

        'uses' => 'SchoolController@reviewApplication3',
        'as' => 'reviewApplication3',
        'middleware' => 'auth'
    ])->middleware(App\Http\Middleware\SchoolMiddleware::class);

    Route::get('/reviewApplication/2/3/4/{applicant_id}', [

        'uses' => 'SchoolController@reviewApplication4',
        'as' => 'reviewApplication4',
        'middleware' => 'auth'
    ])->middleware(App\Http\Middleware\SchoolMiddleware::class);

    Route::get('/reviewApplication/2/3/4/5/{applicant_id}', [

        'uses' => 'SchoolController@reviewApplication5',
        'as' => 'reviewApplication5',
        'middleware' => 'auth'
    ])->middleware(App\Http\Middleware\SchoolMiddleware::class);

    Route::post('/reviewApplication/2/3/4/5/final/{applicant_id}', [
        'uses' => 'SchoolController@reviewFinal',
        'as' => 'reviewFinal',
        'middleware' => 'auth'
    ])->middleware(App\Http\Middleware\SchoolMiddleware::class);

    Route::post('/viewApplication', [
        'uses' => 'SchoolController@postGetApplication',
        'as' => 'viewApplication',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\SchoolMiddleware::class);


    Route::post('/saveUpdateVacancies', [
        'uses' => 'SchoolController@saveUpdateVacancies',
        'as' => 'saveUpdateVacancies',
        'middleware' => 'auth'

    ])->middleware(App\Http\Middleware\SchoolMiddleware::class);


});







