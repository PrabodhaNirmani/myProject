<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\applicant;
use App\Models\Error;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function testDB(){
        $cus=new CustomConnection();
        $con=$cus->db_connect();
        $sql="INSERT  INTO user(user_name,password,user_type) VALUES ('amal','amal','admin')";
        mysqli_query($con,$sql);
        $sql1="SELECT * FROM user";
        $val=mysqli_query($con,$sql1);
        if (mysqli_num_rows($val)) {
            while ($row = mysqli_fetch_row($val)) {
                $row=mysqli_fetch_row($val);
                return view('viewTest',compact('row'));
            }
        }
    }
    
    public function schoolSignUp(Request $request){

        if ($request['confirm_password'] == $request['password']) {

            $user = User::schoolSignUp($request);
            if (get_class($user) == App\Models\Error){

            }



                return view('login', compact('error'));


            Auth::login($user);
            $user_type = $user->getUser_Type();
            if ($user_type == 'admin') {

                return view('dashboard',compact('user_type'));

            } elseif ($user_type == 'school') {

                return view('dashboard',compact('user_type'));
            }
            else {

                return view('dashboard',compact('user_type'));
            }
        }
        else{
            $error = "Password confirmation did not match";
            return $error;
        }

}

    
    public function login(Request $request){

        $user = User::authenticate($request);
        
        if ($user!=null){

            Auth::login($user);
            $user_type = $user->getUser_Type();
            if ($user_type == 'admin') {

                return view('dashboard',compact('user_type'));

            } elseif ($user_type == 'school') {

                return view('dashboard',compact('user_type'));
            }
            else {

                return view('dashboard',compact('user_type'));
            }

        }
        else{
            
            $error = "Username and password did not match";
            return view('test',compact('error'));

        }

    }
    
    public function getSearchSchool(){
        $districts=District::getDistrict();
        $schools=null;
        $error=null;
        $city=null;
        return view('searchSchool',compact('districts','schools','error','city'));
    }

    public function postSearchSchool(Request $request){
        $city=$request['district'];
        $connection=DatabaseController::db_connect();
        $sql="SELECT * FROM school WHERE city='$city'";
        $result=mysqli_query($connection,$sql);
        $schools=array();

        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_row($result)){
                array_push($schools,$row);
            }
            $error=null;
        }
        else{
            $error="No Schools Found from ".$city." district";
            $schools=null;
        }
        $districts=District::getDistrict();
        $city=$city." District";
        return view('searchSchool',compact('districts','schools','error','city'));
        
    }








    public function loginView(){
     return view('login');
    }





    public function testing(){
        $user = Auth::user()->user_name;
        return view('loginSuccess',compact('user'));
    }



}
