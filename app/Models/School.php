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

        $user = User::schoolSignUp($request);
        if (get_class($user) == 'App\Models\Error'){
            
            return $user;
        }
        if ($request['boys_school' == 'on']){
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
    
    public function search(Request $request){
        
        
    }

    



}