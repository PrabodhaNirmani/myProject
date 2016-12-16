<?php

namespace App\Http\Controllers;

//namespace App\Http\Persistene;
//
use App\Http\Persistene;
use App\Models\User;
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
    
    public function login(){
        
        $myUser = new User();
        $myUser->setUser_Name('Thirasara');
        $myUser->setPassword('thiraaa');
        $myUser->setUser_Type('admin');
        $path = CustomConnection::insert($myUser);
        return view('loginSuccess',compact('path'));
    }


}
