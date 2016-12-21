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
        $applicant_id = intval($applicant_id);
        $connection = DatabaseController::db_connect();
        $query = "SELECT * from applicant_guardian where applicant_id = ";
        $result = $connection->query($query);
        $stmt = $connection->prepare($query);
        $stmt->bind_param("i",$applicant_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    



}