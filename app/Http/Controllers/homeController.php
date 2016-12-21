<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\applicant;
use App\Models\Error;
use App\Models\School;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function testDB(){
       // $cus=new CustomConnection();
        $con=DatabaseController::db_connect();
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

        if ($request['confirm_password'] != $request['password']) {

            $error = "Password confirmation did not match";
            return view('register', compact('error'));
        }
        else{
            $user = User::schoolSignUp($request);

            if (get_class($user) == 'App\Models\Error'){

                if ($user->error_no == 1062){

                    $error = "Username already exists! SignUp with a different username";
                }

                else{
                    $error = $user->error_description;
                }
                return view('register', compact('error'));
            }
            
            Auth::login($user);
            return redirect()->route('getDashboard');
        }

}

    public function signUp(Request $request){

        if ($request['confirm_password'] != $request['password']) {
            
            $error = "Password confirmation did not match";
            return view('register', compact('error'));
        }
        else{
            $user = User::signUp($request);

            if (get_class($user) == 'App\Models\Error'){

                if ($user->error_no == 1062){

                    $error = "Username already exists! SignUp with a different username";
                }

                else{
                    $error = $user->error_description;
                }
                return view('register', compact('error'));
            }
            Auth::login($user);
            $this->middleware('auth');
            return redirect()->route('getDashboard');
            
        }

    }

    
    public function login(Request $request){

        $user = User::authenticate($request);
        if ($user!=null) {

            Auth::login($user);
            $this->middleware('auth');
            return redirect()->route('getDashboard');
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
        $sql="SELECT * FROM school WHERE district='$city'";
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
        $done = null;
        return view('dashboard',compact('user','done'));
    }

    public function logout(){

        Auth::logout();
        return redirect()->route('loginView');
    }




    public function testing(){
        $user = Auth::user()->user_name;
        return view('loginSuccess',compact('user'));
        
    }
    
    public function getWelcome(){
        return view('welcome');
    }

    public function getViewResults(){
        $user=array();
        array_push($user,Auth::user()->user_type,Auth::user()->id);
        if($user[0]=='admin'){
            $error=null;
            $applicants=null;
            $school_name=School::getSchools();
            return view('viewResults',compact('user','error','applicants','school_name'));            

        }
        elseif($user[0]=='student'){
            $connection = DatabaseController::db_connect();
//            echo $user[1];

            $query1 = "SELECT selected_school FROM applicant WHERE applicant_id=?";
            $stmt1 = $connection->prepare($query1);
            $stmt1->bind_param("i",$user[1]);
            $stmt1->execute();
            $result1 = $stmt1->get_result();
            if(mysqli_num_rows($result1)>0){
                $row=mysqli_fetch_row($result1);
//                echo $row[0];
                $query2="SELECT applicant_id, first_name,last_name FROM applicant WHERE selected_school=?";
                $stmt2 = $connection->prepare($query2);
                $stmt2->bind_param("i",$row[0]);
                $stmt2->execute();
                $result2 = $stmt2->get_result();
                $applicants=array();
                while($row_details=mysqli_fetch_row($result2)){

                    $query4="SELECT marks FROM applicant_priority WHERE applicant_id=?";
                    $stmt4 = $connection->prepare($query4);
                    $stmt4->bind_param("i",$row[0]);
                    $stmt4->execute();
                    $result4 = $stmt4->get_result();
                    $mark=mysqli_fetch_row($result4);
                    array_push($row_details,$mark);
                    array_push($applicants,$row_details);
                    
                }
                $query3="SELECT school_name FROM school WHERE school_id=?";
                $stmt3 = $connection->prepare($query3);
                $stmt3->bind_param("i",$row[0]);
                $stmt3->execute();
                $result3 = $stmt3->get_result();
                $school_name=mysqli_fetch_row($result3);
                $error=null;
                DatabaseController::closeConnection($connection);
                return view('viewResults',compact('user','error','applicants','school_name'));
                
            }
            $error="This applicant does not submit an application";
            $applicants=null;
            $school_name=null;
            DatabaseController::closeConnection($connection);
            return view('viewResults',compact('user','error','applicants','school_name'));


        }
        else{
            $connection=DatabaseController::db_connect();
            $query1="SELECT applicant_id, first_name,last_name FROM applicant WHERE selected_school=?";
            $stmt1 = $connection->prepare($query1);
            $stmt1->bind_param("i",$user[1]);
            $stmt1->execute();
            $result1 = $stmt1->get_result();

            $query2="SELECT school_name FROM school WHERE school_id=?";
            $stmt2 = $connection->prepare($query2);
            $stmt2->bind_param("i",$user[1]);
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            $school_name=mysqli_fetch_row($result2);
            
            if(mysqli_num_rows($result1)>0){
                $applicants=array();
                while($row_details=mysqli_fetch_row($result1)){
                    $query4="SELECT marks FROM applicant_priority WHERE applicant_id=?";
                    $stmt4 = $connection->prepare($query4);
                    $stmt4->bind_param("i",$row_details[0]);
                    $stmt4->execute();
                    $result4 = $stmt4->get_result();
                    $mark=mysqli_fetch_row($result4);
                    array_push($row_details,$mark);
                    array_push($applicants,$row_details);

                }
                
                $error=null;
                DatabaseController::closeConnection($connection);
                return view('viewResults',compact('user','error','applicants','school_name'));    
            }
            $error="No Students Selected";
            $applicants=null;
            
            DatabaseController::closeConnection($connection);
            return view('viewResults',compact('user','error','applicants','school_name'));
            

        }
    }




}
