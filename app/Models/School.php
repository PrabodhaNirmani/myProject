<?php
/**
 * Created by PhpStorm.
 * User: ThirasaraDevanmini
 * Date: 12/16/2016
 * Time: 2:13 PM
 */

namespace App\Models;


use App\Http\Controllers\DatabaseController;
use Illuminate\Http\Request;
use Auth;

class School
{
    private static $fieldNames =['school_id','school_type','school_name','street','city','district'];
    private static $tableName = 'school';

    public static function addSchool(Request $request){

        echo $request;
        $user = User::schoolSignUp($request);
        if (get_class($user) == 'App\Models\Error'){
            
            return $user;
        }
        if ($request['boys_school']  == 'on'){
            $school_type = 'boys';
        }
        elseif ($request['girls_school'] == 'on'){
            $school_type = 'girls';
        }
        else{
            $school_type = 'mixed';
        }
        $values = [];
        array_push($values,$user->getId());
        array_push($values,$school_type);
        foreach (array_slice(School::$fieldNames,2) as $field){
            array_push($values,$request[$field]);
        }

        $conn = DatabaseController::insert(School::$tableName,School::$fieldNames,$values);
        if ($conn->errno ==0){
            DatabaseController::closeConnection($conn);

            return $user;
        }
        else {

            $error = new Error($conn->error,$conn->errno);
            DatabaseController::closeConnection($conn);
            return $error;
        }
        


    }

    public static function getApplicants($school_id){

        $connection = DatabaseController::db_connect();
        $query = "SELECT a.applicant_id, a.first_name, a.last_name FROM applicant as a, applicant_priority as ap 
                                    where (ap.applicant_id,ap.school_id)=(a.applicant_id,?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i",$school_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    
    public static function searchApplicants($school_id,$applicant_id){

        $connection = DatabaseController::db_connect();
        $query = "SELECT a.applicant_id, a.first_name, a.last_name FROM applicant as a, applicant_priority as ap 
                                    where (a.applicant_id,a.applicant_id,ap.school_id)=(?,ap.applicant_id,?)";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ii",$applicant_id,$school_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
        
    }

    public static function reviewApplication1($applicant_id){

        $connection = DatabaseController::db_connect();
        $query = "SELECT * from applicant where applicant_id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i",$applicant_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
    public static function reviewApplication2($applicant_id){

        $connection = DatabaseController::db_connect();
        $query = "SELECT * from applicant_guardian where applicant_id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i",$applicant_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;

    }

    public static function reviewApplication3($applicant_id){

        $connection = DatabaseController::db_connect();
        $query = "SELECT guardian_id from applicant_guardian where applicant_id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i",$applicant_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $guardian = $result->fetch_assoc();
            $stmt->close();
            $query1 = "SELECT past_stu_id from guardian_past_pupil where guardian_id = ?";
            $stmt1 = $connection->prepare($query1);
            $stmt1->bind_param("i",$guardian['guardian_id']);
            $stmt1->execute();
            $result1 = $stmt1->get_result();
            if ($result1->num_rows > 0) {
                $past_student = $result1->fetch_assoc();
                $stmt1->close();
                $query2 = "SELECT registered_date from student where admission_no = ? and school_id = ?";
                $stmt2 = $connection->prepare($query2);
                $school_id = Auth::user()->id;
                $stmt2->bind_param("ii",$past_student['past_stu_id'],$school_id);
                $stmt2->execute();
                $result2 = $stmt2->get_result();
                if ($result2->num_rows > 0) {
                    $reg_date = $result2->fetch_assoc();
                    $stmt2->close();
                    $query3 = "SELECT * from past_student where past_stu_id = ?";
                    $stmt3 = $connection->prepare($query3);
                    $stmt3->bind_param("i",$past_student['past_stu_id']);
                    $stmt3->execute();
                    $result4 = $stmt3->get_result();
                    $res = array();
                    array_push($res,$reg_date['registered_date']);
                    array_push($res,$result4);
                    return $res;

                } 
                else {
                    return null;

                }
                
            } 
            else {
               return null;

            }
            

        } 
        else {
            return null;

        }


    }

    public static function reviewApplication4($applicant_id){

        $connection = DatabaseController::db_connect();
        $query = "SELECT present_stu_id from applicant_sibling where applicant_id = ?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i",$applicant_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $sibling = $result->fetch_assoc();
            $stmt->close();
            $query1 = "SELECT * from student where admission_no = ? and school_id = ?";
            $stmt1 = $connection->prepare($query1);
            $school_id = Auth::user()->id;
            $stmt1->bind_param("ii",$sibling['present_stu_id'],$school_id);
            $stmt1->execute();
            $result1 = $stmt1->get_result();
            return $result1;

        } 
        else {
            return null;

        }
    }

    public static function reviewApplication5($applicant_id){

        $connection = DatabaseController::db_connect();
        $query = "SELECT * from applicant_priority where applicant_id = ? and school_id = ?";
        $stmt = $connection->prepare($query);
        $school_id = Auth::user()->id;
        $stmt->bind_param("ii",$applicant_id,$school_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;

    }

    public static function getSchools(){
        $connection = DatabaseController::db_connect();
        $query = "SELECT school_id,school_name FROM school";

        $result = mysqli_query($connection,$query);
        $schools=array();
        while($row=mysqli_fetch_row($result)){
            array_push($schools,$row);

        }
        return $schools;

    }


    public static function getVacanciesAvailable(){
        $user_id=Auth::user()->id;

        $query="SELECT school_id,school_name,max_no_student FROM school WHERE school_id=?";

        $connection=DatabaseController::db_connect();
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i",$user_id);
        $stmt->execute();
        $result = $stmt->get_result();


        if(mysqli_num_rows($result)){

            $row=mysqli_fetch_row($result);
            mysqli_close($connection);
            return $row;

        }
    }

    public static function saveVacanciesAvailable($num_students){

        $user_id=Auth::user()->id;

        $connection=DatabaseController::db_connect();
        $query="UPDATE school SET max_no_student=?  WHERE school_id=?";
        $stmt = $connection->prepare($query);
        $stmt->bind_param("ii",$num_students,$user_id);
        $stmt->execute();
        $result = $stmt->get_result();




    }
    
}