<?php

namespace App\Http\Controllers;


use App\Models\District;
use App\Models\School;
use App\Models\User;
use Auth;
use Illuminate\Database\Connection;
use Illuminate\Http\Request;
use Illuminate\Queue\Connectors\DatabaseConnector;

class AdminController extends Controller
{

    public function getRegisterSchoolView()
    {
        $district_row = District::getDistrict();
        $error = null;
        $done = null;
        return view('registerSchool', compact('district_row', 'error', 'done'));
    }

    public function registerSchool(Request $request)
    {

        $district_row = District::getDistrict();
        $user = School::addSchool($request);
        if (get_class($user) == 'App\Models\Error') {

            if ($user->error_no == 1062) {

                $error = "Username of school already exists! SignUp with a different username";
            } else {
                $error = $user->error_description;
            }
            $done = null;
            return view('registerSchool', compact('district_row', 'error', 'done'));
        }

        $done = "School was successfully added";
        $error = null;
        return view('registerSchool', compact('district_row', 'error', 'done'));
    }

    public function getManageSession()
    {

        $connection = DatabaseController::db_connect();
        $year_raw = mysqli_query($connection, "select YEAR (year_boundary) from session_date;");
        $flag_raw = mysqli_query($connection, "select activate from session_date;");

        $year = mysqli_fetch_row($year_raw);
        $flag = mysqli_fetch_row($flag_raw);

        $date = mysqli_fetch_row(mysqli_query($connection, "select year_boundary from session_date;"));
        $done=null;
        return view('manageSession', compact('year', 'flag', 'date','done'));
    }

    public function postManageSession(Request $request)
    {
        // $district_row=District::getDistrict();

        $date = $request['session_date'];
        $connection = DatabaseController::db_connect();

        $query = "update session_date set year_boundary='" . $date . "' where session_id=1";
        mysqli_query($connection, $query);
        $query_activate = "update session_date set activate=1 where session_id=1";
        mysqli_query($connection, $query_activate);

        $result = mysqli_query($connection, "select YEAR (year_boundary) from session_date");

        $year = mysqli_fetch_row($result);

        $flag = mysqli_fetch_row(mysqli_query($connection, "select activate from session_date where session_id=1"));
        $date = mysqli_fetch_row(mysqli_query($connection, "select year_boundary from session_date;"));

        $done=null;
        return view('manageSession', compact('year', 'flag', 'date','done'));
    }


    public function getDeactivateSession()
    {
        $connection = DatabaseController::db_connect();

        mysqli_query($connection, "update session_date set activate=0 where session_id=1");

        $result = mysqli_query($connection, "select YEAR (year_boundary) from session_date");

        $year = mysqli_fetch_row($result);

        $flag = mysqli_fetch_row(mysqli_query($connection, "select activate from session_date where session_id=1"));
        $date = mysqli_fetch_row(mysqli_query($connection, "select year_boundary from session_date;"));

//Update marks--------------

        $app_scl = "select applicant_id, school_id from applicant_priority;";

        $result = mysqli_query($connection, $app_scl);


        while ($row = mysqli_fetch_row($result)) {

            $applicant_id = $row[0];
            $school_id = $row[1];
            $func_cal_marks = "select calculate_marks(" . $applicant_id . "," . $school_id . ")";
            $result = mysqli_query($connection, $func_cal_marks);

            $mark = mysqli_fetch_row($result);
            $update = "update applicant_priority set marks =" . $mark[0] . " where applicant_id=" . $applicant_id . " and school_id =" . $school_id . ";";
            mysqli_query($connection, $update);
        }

//----------------------------
        $done=null;
        return view('manageSession', compact('year', 'flag', 'date','done'));

    }

    public function update_marks(Connection $connection)
    {

        $app_scl = "select applicant_id, school_id from applicant_priority;";

        $result = mysqli_query($connection, $app_scl);

        while ($row = mysqli_fetch_row($result)) {

            $applicant_id = $row[0];
            $school_id = $row[1];
            $func_cal_marks = "select calculate_marks(" . $applicant_id . "," . $school_id . ")";
            $result = mysqli_query($connection, $func_cal_marks);
            $mark = mysqli_fetch_row($result);

            $update = "update student_priority set marks =" . $mark[0] . " where applicant_id=" . $applicant_id . " and school_id =" . $school_id;
            mysqli_query($connection, $update);
        }

    }

    public function getEvaluateResults()
    {

            $con = DatabaseController::db_connect();
            $setSchool = mysqli_query($con, "select * from school");
            if ($setSchool->num_rows > 0) {
                $schoolMax = array();
                while ($row = mysqli_fetch_row($setSchool)) {
                    $temp = array();
                    array_push($temp, $row[0], $row[6]);
                    array_push($schoolMax, $temp);
                }
            }

            $applicantSchool = array();
            $sql = "select distinct applicant_id from applicant_priority";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_row($res)) {
                $applicantSchool[$row[0]] = 0;

            }
            $applicantMark = array();
            for ($i = 0; $i < sizeof($schoolMax); $i++) {
                $query1 = "select applicant_id,priority,marks from applicant_priority where school_id=" . $schoolMax[$i][0] . " order by(marks) desc";
                $res = mysqli_query($con, $query1);
                if ($res->num_rows > 0) {
                    $applicants_in_school = array();
                    while ($row = mysqli_fetch_row($res)) {
                        array_push($applicants_in_school, $row);
                    }
                    array_push($applicantMark, $applicants_in_school);
                }
            }
            $change = true;
            while ($change) {
                $change = false;
                for ($k = 0; $k < sizeof($applicantMark); $k++) {
                    $j = 0;
                    $count = 0;
                    while ($j < min($schoolMax[$k][1], sizeof($applicantMark[$k]))) {
                        if ($count >= sizeof($applicantMark[$k])) {
                            break;
                        }
                        if ($applicantSchool[$applicantMark[$k][$count][0]] == 0) {
                            $change = true;
                            $applicantSchool[$applicantMark[$k][$count][0]] = $applicantMark[$k][$count][1];
                            $j++;
                        } elseif ($applicantMark[$k][$count][1] < $applicantSchool[$applicantMark[$k][$count][0]]) {
                            $change = true;
                            $applicantSchool[$applicantMark[$k][$count][0]] = $applicantMark[$k][$count][1];
                            $j++;
                        } elseif ($applicantMark[$k][$count][1] == $applicantSchool[$applicantMark[$k][$count][0]]) {
                            $j++;
                        }
                        $count = $count + 1;

                    }
                }
            }
        $temp=array_keys($applicantSchool);
        foreach ($temp as $i) {
            $sql = "SELECT school_id from applicant_priority where ( applicant_id,priority )=($i,$applicantSchool[$i])";
            $data = mysqli_query($con, $sql);
            if (mysqli_num_rows($data)) {
                $row=mysqli_fetch_row($data);
                $sql =  "UPDATE applicant set selected_school = $row[0] where (applicant_id=$i)";
                $data = mysqli_query($con, $sql);
            }
        }

        $year_raw = mysqli_query($con, "select YEAR (year_boundary) from session_date;");
        $flag_raw = mysqli_query($con, "select activate from session_date;");

        $year = mysqli_fetch_row($year_raw);
        $flag = mysqli_fetch_row($flag_raw);

        $date = mysqli_fetch_row(mysqli_query($con, "select year_boundary from session_date;"));
        $done='done';
        return view('manageSession', compact('year', 'flag', 'date','done'));

    }
}
