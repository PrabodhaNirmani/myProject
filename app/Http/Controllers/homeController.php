<?php

namespace App\Http\Controllers;


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



        $user_name = $request['username'];
        $password = $request['password'];

        $user = User::authenticate($user_name,$password);


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

    public function loginView(){
     return view('login');
    }
    public function testing(Request $request){
        $user = Auth::user()->user_name;
        return view('loginSuccess',compact('user'));
    }



}
