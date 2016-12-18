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

    public function getApplicantList(){
        $applicants=null;

        return view('applicantList',compact('applicants'));
    }

    public function postGetApplication(Request $request){
//        $district_row=District::getDistrict();
//
//        return view('registerSchool',compact('district_row'));
    }


}
