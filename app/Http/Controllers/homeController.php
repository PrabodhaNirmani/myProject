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

            $selected_school=$this->getSelectedSchool($connection,$user[1]);

            if($selected_school!=null){
                $error=null;
                $applicants=$this->getDetails($selected_school,$connection);
                $school_name=$this->getSchoolName($selected_school,$connection);
                DatabaseController::closeConnection($connection);
                return view('viewResults',compact('user','error','applicants','school_name'));
            }
            else{
                $school_name=null;
                $applicants=null;
                $error="This applicant does not submit an application";
                DatabaseController::closeConnection($connection);
                return view('viewResults',compact('user','error','applicants','school_name'));
            }
        }
        else{
            $connection=DatabaseController::db_connect();
            $applicants=$this->getDetails($user[1],$connection);
            $school_name=$this->getSchoolName($user[1],$connection);
            if($applicants!=null){
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
    public function postAdminViewResults(Request $request){
        $user=array();
        array_push($user,Auth::user()->user_name);
        array_push($user,Auth::user()->id);

        $id=(explode("-",$request['school']));
        $school_id=$id[0];
        $connection=DatabaseController::db_connect();
        $school_name=$id[1];
        $applicants=$this->getDetails($school_id,$connection);
        if($applicants!=null){
            $error=null;
            DatabaseController::closeConnection($connection);
            echo $applicants;
            return view('viewResults',compact('user','error','applicants','school_name'));
            
        }
        $error="No applicants found";
        $applicants=null;
        return view('viewResults',compact('user','error','applicants','school_name'));
        
    }
    
    
    private function getSelectedSchool($connection,$applicant_id){
        $query="SELECT selected_school FROM applicant WHERE applicant_id=?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i",$applicant_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result)>0) {
            $ans=mysqli_fetch_row($result);
            return $ans[0];
        }

        return null;
    }

    private function getSchoolName($school_id,$connection){
        $query="SELECT school_name FROM school WHERE school_id=?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i",$school_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $school_name=mysqli_fetch_row($result);
        return $school_name[0];
    }



    private function getDetails($school_id,$connection)
    {
//        $query="SELECT applicant_id FROM applicant WHERE selected_school=?";
//        $stmt = $connection->prepare($query);
//        $stmt->bind_param("i",$school_id);
//        $stmt->execute();
//        $result = $stmt->get_result();
//        if(mysqli_num_rows($result)>0) {
//
//            $id=array();
//            while ($row_details = mysqli_fetch_row($result)) {
//                array_push($id,$row_details[0]);
//
//
//            }
//            $applicants = array();
//            foreach ($id as $i){
//                $query="SELECT a.applicant_id,a.first_name,a.last_name,ap.marks FROM applicant as a,applicant_priority as ap WHERE (ap.applicant_id,a.applicant_id)=(?,ap.applicant_id)";
//                $stmt = $connection->prepare($query);
//                $stmt->bind_param("i",$i);
//                $stmt->execute();
//                $result = $stmt->get_result();
//                if(mysqli_num_rows($result)>0){
//                    $data=mysqli_fetch_row($result);
//                    array_push($applicants, $data[0]);
//UPDATE applicant set selected_school = 1 where applicant_id=2
//                }
//
//            }
//            return $applicants;
//        }
//        return null;
//

        $query="SELECT a.applicant_id, a.first_name,a.last_name,ap.marks FROM applicant as a,applicant_priority as ap WHERE (a.applicant_id,a.selected_school,a.selected_school)=(ap.applicant_id,ap.school_id,?) ORDER BY (ap.marks) DESC ";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i",$school_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if(mysqli_num_rows($result)>0) {
            $applicants = array();
            while ($row_details = mysqli_fetch_row($result)) {
                array_push($applicants, $row_details);

            }
            return $applicants;
        }
        return null;

    }
    
}
