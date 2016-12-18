<?php

namespace App\Http\Controllers;


use App\Models\District;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;


class SchoolController extends Controller
{

    public function getUpdateVacancies(){
        $vacancies=null;

        return view('updateVacancies',compact('vacancies'));
    }

    public function postUpdateVacancies(Request $request){
//        $district_row=District::getDistrict();
//
//        return view('registerSchool',compact('district_row'));
    }

   public function getApplicantList()
    {
        // $applicants=null;
        $connection = DatabaseController::db_connect();
        //$user = Auth::user()->user_id;
        $query = "SELECT applicant.applicant_id, applicant.first_name, applicant.last_name FROM applicant, applicant_priority where (applicant_priority.applicant_id,applicant_priority.school_id)=(applicant.applicant_id,1)";
        $result = mysqli_query($connection, $query);

        $applicants = array();
        $error = null;

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                array_push($applicants, $row);
            }
        } else {
            $error = "No applicants found";
            $applicants = null;
        }

        return view('searchApplicant', compact('applicants', 'error'));
    }

    public function postApplicantList(Request $request)
    {
        // $applicants=null;
        $connection = DatabaseController::db_connect();
        //$user = Auth::user()->user_id;
        $applicant_id =$request['applicant_id'];
        $query = "SELECT applicant.applicant_id, applicant.first_name, applicant.last_name FROM applicant, applicant_priority where (applicant_priority.applicant_id,applicant_priority.school_id)=($applicant_id,1)";
        $result = mysqli_query($connection, $query);

        $applicants = array();
        $error = null;

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_row($result)) {
                array_push($applicants, $row);
            }
        } else {
            $error = "No applicants found";
            $applicants = null;
        }

        return view('searchApplicant', compact('applicants', 'error'));
    }

    public function postGetApplication(Request $request){
//        $district_row=District::getDistrict();
//
//        return view('registerSchool',compact('district_row'));
    }


}
