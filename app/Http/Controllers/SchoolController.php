<?php

namespace App\Http\Controllers;


use App\Models\District;
use App\Models\School;
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
        
        $school_id = Auth::user()->id;
        $result = School::getApplicants($school_id);
        $applicants = array();
        $error = null;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($applicants, $row);
            }
        } else {
            $error = "No applicants found";
            $applicants = null;
        }

        return view('viewApplicants', compact('applicants', 'error'));
    }

    public function postApplicantList(Request $request)
    {

        $school_id = Auth::user()->id;
        $applicant_id =$request['applicant_id'];

        $result = School::searchApplicants($school_id, $applicant_id);

        $applicants = array();
        $error = null;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($applicants, $row);
            }
        } else {
            $error = "No applicants found";
            $applicants = null;
        }

        return view('viewApplicants', compact('applicants', 'error'));
    }
    
    public function reviewApplication1(){
        
    }

    public function postGetApplication(Request $request){
//        $district_row=District::getDistrict();
//
//        return view('registerSchool',compact('district_row'));
    }


}
