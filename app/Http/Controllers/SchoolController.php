<?php

namespace App\Http\Controllers;


use App\Models\District;
use App\Models\Error;
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
    
    public function reviewApplication1($applicant_id){

        $result =School::reviewApplication1($applicant_id);

        if ($result->num_rows > 0) {
            $applicant = $result->fetch_assoc();

        } else {
            $error = "Cannot Load the results";
            return redirect()->back();
            
        }
        $error = null;
        return view('schoolApplicationReview1',compact('applicant','error'));
        
    }

    public function reviewApplication2($applicant_id){

        return view('schoolApplicationReview2',compact('applicant','error'));

    }
    public function reviewApplication3($applicant_id){

        return view('schoolApplicationReview3',compact('applicant','error'));

    }

    public function reviewApplication4($applicant_id){

        return view('schoolApplicationReview4',compact('applicant','error'));

    }
    public function reviewApplication5($applicant_id){

        return view('schoolApplicationReview5',compact('applicant','error'));

    }

    public function postGetApplication(Request $request){
//        $district_row=District::getDistrict();
//
//        return view('registerSchool',compact('district_row'));
    }


}
