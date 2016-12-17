<?php

namespace App\Http\Controllers;


use App\Models\District;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function getRegisterSchool(){

        $district_row=District::getDistrict();
        
        
        return view('registerSchool',compact('district_row'));
    }


}
