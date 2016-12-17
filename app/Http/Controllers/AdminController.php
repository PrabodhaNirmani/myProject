<?php

namespace App\Http\Controllers;


use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function getRegisterSchool(){
        $connection=DatabaseController::db_connect();
        $sql="SELECT * from district ORDER by (city)";
        $data=mysqli_query($connection,$sql);
        $district_row=array();
        while($row=mysqli_fetch_row($data)){
            array_push($district_row,$row);
            
        }
        
        
        return view('registerSchool',compact('district_row'));
    }


}
