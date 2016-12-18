<?php
/**
 * Created by PhpStorm.
 * User: Surani Hiranyada
 * Date: 12/18/2016
 * Time: 1:25 AM
 */

namespace App\Http\Controllers;


use App\Models\District;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Applicant;
use App\Models\ApplicantGuardian;
use App\Models\ApplicantPriority;
use App\Models\ApplicantSibiling;

class StudentController extends Controller
{
    public function getApplicant(){
        $error=null;
        return view('applicationSection1',compact('error'));
    }
    
    public function postApplicant(Request $request){
        $applicant=new Applicant();
        
        try{
            $result=$applicant->createApplicant($request);
        }catch (\mysqli_sql_exception $e){
            $error='Invalid Birthday Entry';
            return view('applicationSection1',compact('error'));
        }
        $error=null;
        return view('applicationSection2',compact('error'));

    }

    public function getApplicantGuardian(){
        $error=null;
        return view('applicationSection2',compact('error'));
    }

    public function postApplicantGuardian(Request $request){
        $applicant_guardian=new ApplicantGuardian();
        $error='Invalid Entry';
        try{
            $result=$applicant_guardian->createApplicantGuardian($request);
        }catch (\mysqli_sql_exception $e){
            return view('applicationSection2',compact('error'));
        }
        $error=null;
        return view('applicationSection3',compact('error'));

    }

    public function getApplicantPriority(){
        $error=null;
        return view('applicationSection3',compact('error'));
    }
    public function postApplicantPriority(Request $request){
        $applicant_guardian=new ApplicantPriority();
        $error='Invalid Entry';
        try{
            $result=$applicant_guardian->createApplicantPriority($request);
        }catch (\mysqli_sql_exception $e){
            return view('applicationSection3',compact('error'));
        }
        return view('applicationSection4');

    }

    public function getApplicantSibiling(){
        $error=null;
        return view('applicationSection4',compact('error'));
    }
    public function postApplicantSibiling(Request $request){
        $applicant_guardian=new ApplicantGuardian();
        $error='Invalid Entry';
        try{
            $result=$applicant_guardian->createApplicantSibiling($request);
        }catch (\mysqli_sql_exception $e){
            return view('applicationSection4',compact('error'));
        }
        return view('applicationSection4');

    }
}