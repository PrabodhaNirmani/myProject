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
            if (get_class($user) == 'App\Models\Error'){

                if ($user->error_no == 1062){

                    $error = "Username already exists! Signup with a different username";
                }

                else{
                    $error = $user->error_description;
                }
                return view('register', compact('error'));
            }

            Auth::login($user);
            $user_type = $user->getUser_Type();
            if ($user_type == 'admin') {

                return redirect()->route('getDashboard');

            } elseif ($user_type == 'school') {

                return redirect()->route('getDashboard');
            }
            else {

                return redirect()->route('getDashboard');
            }
        }
        else{
            $error = "Password confirmation did not match";
            return view('register', compact('error'));
        }

}

    public function signUp(Request $request){

        if ($request['confirm_password'] == $request['password']) {

            $user = User::signUp($request);
//            $type = get_class($user);
//            return view('test',compact('user'));
            if (get_class($user) == 'App\Models\Error'){

                if ($user->error_no == 1062){

                    $error = "Username already exists! Signup with a different username";
                }

                else{
                    $error = $user->error_description;
                }
                return view('register', compact('error'));
            }

            Auth::login($user);
            $user_type = $user->getUser_Type();
            if ($user_type == 'admin') {

                return redirect()->route('getDashboard');

            } elseif ($user_type == 'school') {

                return redirect()->route('getDashboard');
            }
            else {

                return redirect()->route('getDashboard');
            }
        }
        else{
            $error = "Password confirmation did not match";
            return view('register', compact('error'));
        }

    }

    
    public function login(Request $request){

        $user = User::authenticate($request);
        echo $request;
        if ($user!=null){

            Auth::login($user);
            $user_type = $user->getUser_Type();
            if ($user_type == 'admin') {

                return redirect()->route('getDashboard');

            } elseif ($user_type == 'school') {

                return redirect()->route('getDashboard');
            }
            else {

                return redirect()->route('getDashboard');
            }

        }
        else{
            
            $error = "Username and password did not match";
            return view('login',compact('error'));

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
        $error = null;
     return view('login',compact('error'));
    }
    
    public function signUpView(){
        $error = null;
        return view('register',compact('error'));
    }
    
    public function getDashboard(){
        $user = [];
        array_push($user,Auth::user()->user_name);
        array_push($user,Auth::user()->user_type);
        array_push($user,Auth::user()->id);
        return view('dashboard',compact('user'));
    }

    public function logout(){
//        $user = Auth::user()->user_name;
//        return view('loginSuccess',compact('user'));

    }




    public function testing(){
        $user = Auth::user()->user_name;
        return view('loginSuccess',compact('user'));
        
    }



}
