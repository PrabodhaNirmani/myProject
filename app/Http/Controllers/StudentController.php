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

class StudentController extends Controller
{
    public function getApplicationPart1(){
        $error=null;
        return view('applicationSection1',compact('error'));
    }
    
    public function postApplicationPart1(Request $request){
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

    public function getApplicationPart2(){
        $error=null;
        return view('applicationSection2',compact('error'));
    }

    public function postApplicationPart2(Request $request){
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

    public function getApplicationPart3(){
        $error=null;
        return view('applicationSection3',compact('error'));
    }
    public function postApplicationPart3(Request $request){
        $applicant_guardian=new ApplicantPriority();
        $error='Invalid Entry';
        try{
            $result=$applicant_guardian->createApplicantPriority($request);
        }catch (\mysqli_sql_exception $e){
            return view('applicationSection3',compact('error'));
        }
        return view('applicationSection4');

    }

    public function getApplicationPart4(){
        $error=null;
        return view('applicationSection4',compact('error'));
    }
    public function postApplicationPart4(Request $request){
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