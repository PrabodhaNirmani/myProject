<?php

namespace App\Http\Controllers;


use App\Models\applicant;
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
    
    public function signup(){
        
        $myUser = new User();
        $myUser->setUser_Name('Thirasara');
        $myUser->setPassword('thiraaa');
        $myUser->setUser_Type('admin');
        $path = DatabaseController::insert($myUser);
        return view('loginSuccess',compact('path'));
    }
    
    public function login(Request $request){

        $user = User::authenticate($request);
        
        if ($user!=null){

            Auth::login($user);
//            dd(Auth::user());
            if ($user->getUser_Type() == 'admin'){
                return redirect()->route('testing');

            }else{

                return view('welcome');
            }

        }else{
            return view('login');

        }

    }
    
    public function application(Request $request){
        $error='Invalid Birthday Entry';
        try{
            $result=Applicant::createApplicant($request);
        }catch (\mysqli_sql_exception $e){
            return view('application',compact('error'));
        }
        return view('application2');

    }

    public function application_part2(Request $request){
        $applicant_guardian=new ApplicantGuardian();
        $error='Invalid Birthday Entry';
        try{
            $result=$applicant_guardian->createApplicantGuardian($request);
        }catch (\mysqli_sql_exception $e){
            return view('application',compact('error'));
        }
        return view('application2');

    }

    public function loginView(){
     return view('login');
    }
    public function testing(Request $request){
        $user = Auth::user()->user_type;
        return view('loginSuccess',compact('user'));
    }



}
