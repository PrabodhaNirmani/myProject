<?php
/**
 * Created by PhpStorm.
 * User: Surani Hiranyada
 * Date: 12/18/2016
 * Time: 1:25 AM
 */

namespace App\Http\Controllers;


use App\Models\District;
use App\Models\Error;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Applicant;
use App\Models\ApplicantGuardian;
use App\Models\ApplicantPriority;
use App\Models\ApplicantSibling;

class StudentController extends Controller
{
    public function getApplicant(){
        $applicant_id=Auth::user()->id;
        $error=null;
        return view('applicationSection1',compact('error','applicant_id'));
    }
    
    public function postApplicant(Request $request){
        $applicant=new Applicant();
        $applicant_id=$request['applicant_id'];
        $result=$applicant->createApplicant($request);
        if(mysqli_errno($result)!=0) {
            $err = new Error(mysqli_error($result), mysqli_errno($result));
            if ($err->error_no == 1062) {
                $error = 'Applicant already exist';
                return view('applicationSection1', compact('error','applicant_id'));
            }
            elseif ($err->error_no == 1644) {
                $error = 'Invalid Birthday Entry';
                return view('applicationSection1', compact('error','applicant_id'));
            }
            else{
                $error = $err->error_description;
                return view('applicationSection1', compact('error','applicant_id'));
            }
        }
        $error=null;
        $districts=District::getDistrict();
        return view('applicationSection2',compact('error','districts','applicant_id'));

    }

    public function getApplicantGuardian(){
        $error=null;
        $applicant_id=2;
        $districts=District::getDistrict();
        return view('applicationSection2',compact('error','districts','applicant_id'));
    }

    public function postApplicantGuardian(Request $request){
        $applicant_guardian=new ApplicantGuardian();
        $result=$applicant_guardian->createApplicantGuardian($request);
        $applicant_id=$request['applicant_id'];
        if(mysqli_errno($result)!=0) {
            $err = new Error(mysqli_error($result), mysqli_errno($result));
            $districts=District::getDistrict();
            if ($err->error_no == 1062) {
                $error = 'Applicant Guardian already exist';
                return view('applicationSection2', compact('error','districts','applicant_id'));
            }
            else{
                $error = $err->error_description;

                return view('applicationSection2', compact('error','districts','applicant_id'));
            }
        }
        $error=null;
        return view('applicationSection3',compact('error','applicant_id'));

    }

    public function getApplicantPriority(){
        $error=null;
        $applicant_id=2;
        return view('applicationSection3',compact('error','applicant_id'));
    }
    public function postApplicantPriority(Request $request){
        $applicant_priority=new ApplicantPriority();
        $applicant_id=$request['applicant_id'];
        $result=$applicant_priority->createApplicantPriority($request);
        if(mysqli_errno($result)!=0) {
            $err = new Error(mysqli_error($result), mysqli_errno($result));
            if ($err->error_no == 1062) {
                $error = 'Data already exist';
                return view('applicationSection3', compact('error','districts','applicant_id'));
            }
            else{
                $error = $err->error_description;

                return view('applicationSection3', compact('error','districts','applicant_id'));
            }
        }
//        $schools=District::getSchool('Matara');
        $error=null;
        return view('applicationSection4',compact('error','applicant_id'));

    }

    public function getGuardianPastPupil(){
        $applicant_id=2;
        $error=null;
        return view('applicationSection4',compact('error','applicant_id'));
    }
    public function postGuardianPastPupil(Request $request){
        $connection=DatabaseController::db_connect();
        $applicant_id=$request['applicant_id'];
        $sql="SELECT past_student_id from past_student where ( membership_id = request['membership_id'])";
        $data=mysqli_query($connection,$sql);
        if (mysqli_num_rows($data)) {
            $error=null;
            $row=mysqli_fetch_row($data);
            $guardian_past_pupil=new GuardianPastPupil();
            $guardian_past_pupil->createGuardianPastPupil($request);
            return view('applicationSection5',compact('error','applicant_id'));
        }
        $error='Invalid membership id';
        return view('applicationSection4',compact('error','applicant_id'));
        }




    public function getApplicantSibling(){
        $error=null;
        $applicant_id=2;
        return view('applicationSection5',compact('error','applicant_id'));
    }
    public function postApplicantSibling(Request $request){
        $applicant_id=$request['applicant_id'];
//        $applicant_guardian=new ApplicantGuardian();
//        $error='Invalid Entry';
//        try{
//            $result=$applicant_guardian->createGuardianPastPupil($request);
//        }catch (\mysqli_sql_exception $e){
//            return view('applicationSection4',compact('error'));
//        }
        $error=null;
        return view('applicationSection4',compact('error','applicant_id'));

    }
}