<?php

namespace App\Http\Controllers;


use App\Models\District;
use App\Models\School;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function getRegisterSchoolView()
    {
        $district_row = District::getDistrict();
        $error = null;
        $done = null;
        return view('registerSchool', compact('district_row','error','done'));
    }

    public function registerSchool(Request $request){

        $district_row = District::getDistrict();
        $user = School::addSchool($request);
        if (get_class($user) == 'App\Models\Error'){

            if ($user->error_no == 1062){

                $error = "Username of school already exists! SignUp with a different username";
            }

            else{
                $error = $user->error_description;
            }
            $done = null;
            return view('registerSchool', compact('district_row','error','done'));
        }

        $done = "School was successfully added";
        $error = null;
        return view('registerSchool', compact('district_row','error','done'));
    }
    public function getManageSession()
    {

        $connection = DatabaseController::db_connect();
        $year_raw = mysqli_query($connection, "select YEAR (year_boundary) from session_date;");
        $flag_raw = mysqli_query($connection, "select activate from session_date;");

        $year = mysqli_fetch_row($year_raw);
        $flag = mysqli_fetch_row($flag_raw);

        $date = mysqli_fetch_row(mysqli_query($connection, "select year_boundary from session_date;"));
        return view('manageSession', compact('year', 'flag', 'date'));
    }

    public function postManageSession(Request $request)
    {
        // $district_row=District::getDistrict();

        $date = $request['session_date'];
        $connection = DatabaseController::db_connect();

//        $result = mysqli_query($connection, "select year_boundary from session_date");


//        if (mysqli_num_rows($result)) {
        if ($date != null) {
            $query = "update session_date set year_boundary='" . $date . "'";
            mysqli_query($connection, $query);
        }

        $query_activate = "update session_date set activate=1 where session_id=1";
        mysqli_query($connection, $query_activate);

//        } else {
//            $query = "INSERT INTO SESSION_DATE(year_boundary,activate) values ($date,1)";
//            mysqli_query($connection, $query);
//}

        $result = mysqli_query($connection, "select YEAR (year_boundary) from session_date");

        $year = mysqli_fetch_row($result);

        $flag = mysqli_fetch_row(mysqli_query($connection, "select activate from session_date where session_id=1"));
        $date = mysqli_fetch_row(mysqli_query($connection, "select year_boundary from session_date;"));
        return view('manageSession', compact('year', 'flag', 'date'));
    }


    public function getDeactivateSession()
    {

        $connection = DatabaseController::db_connect();

        mysqli_query($connection, "update session_date set activate=0 where session_id=1");

        $result = mysqli_query($connection, "select YEAR (year_boundary) from session_date");

        $year = mysqli_fetch_row($result);

        $flag = mysqli_fetch_row(mysqli_query($connection, "select activate from session_date where session_id=1"));
        $date = mysqli_fetch_row(mysqli_query($connection, "select year_boundary from session_date;"));


        return view('manageSession', compact('year', 'flag', 'date'));

    }

}
