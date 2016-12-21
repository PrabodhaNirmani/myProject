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
        $school=School::getVacanciesAvailable();
        $done=null;
        return view('updateVacancies',compact('school','done'));
    }
    public function saveUpdateVacancies(Request $request){
        $num_students=$request['new_value'];
        School::saveVacanciesAvailable($num_students);
        $school=School::getVacanciesAvailable();
        $done="Changes were saved successfully";
        return view('updateVacancies',compact('school','done'));
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

        $result =School::reviewApplication2($applicant_id);

        if ($result->num_rows > 0) {
            $guardian = $result->fetch_assoc();

        } else {
            $error = "Cannot Load the results";
            $guardian = null;

        }
        $error = null;
        return view('schoolApplicationReview2',compact('guardian','error'));
        

    }
    public function reviewApplication3($applicant_id){
        
        $result =School::reviewApplication3($applicant_id);
        if ($result != null){
            $reg_date = $result[0];
            if ($result[1]->num_rows > 0) {
                $guardian = $result[1]->fetch_assoc();

            } else {
                $error = "Cannot Load the results";
                $guardian = null;

            }
            $error = null;
            return view('schoolApplicationReview3',compact('applicant_id','guardian','reg_date','error'));
        }
        $error = "Guardian is not a past pupil of this School";
        $guardian = null;
        $reg_date = null;
        return view('schoolApplicationReview3',compact('applicant_id','guardian','reg_date','error'));
        
        

    }

    public function reviewApplication4($applicant_id){

        $result =School::reviewApplication4($applicant_id);
        if ($result != null){
            if ($result->num_rows > 0) {
                $sibling = $result->fetch_assoc();
                $error = null;
                return view('schoolApplicationReview4',compact('applicant_id','sibling','error'));
            }
            
        }
        $error = "No siblings in this school";
        $sibling = null;
        return view('schoolApplicationReview4',compact('applicant_id','sibling','error'));
        

    }
    public function reviewApplication5($applicant_id){

        $result =School::reviewApplication5($applicant_id);

        if ($result->num_rows > 0) {
            $distance = $result->fetch_assoc();

        } else {
            $error = "Cannot Load the results";
            $distance = null;

        }
        $error = null;
        return view('schoolApplicationReview5',compact('distance','error'));

    }
    public function reviewFinal($applicant_id,Request $request){
        echo $applicant_id;
        echo $request;
        
        return view('finalReview');

    }

    public function postGetApplication(Request $request){
//        $district_row=District::getDistrict();
//
//        return view('registerSchool',compact('district_row'));
    }


}
