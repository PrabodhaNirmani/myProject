<?php

namespace App\Http\Controllers;


use App\Models\District;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function getRegisterSchool()
    {
        $district_row = District::getDistrict();

        return view('registerSchool', compact('district_row'));
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

        $result = mysqli_query($connection, "select year_boundary from session_date");


//        if (mysqli_num_rows($result)) {
        $date = "update session_date set year_boundary='" . $date . "' , activate = '1' where session_id=1";
        mysqli_query($connection, $date);

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

}
