<?php

/**
 * Created by PhpStorm.
 * User: Saarrah I  Isthikar
 * Date: 12/13/2016
 * Time: 1:06 AM
 */


namespace App\Http\Controllers;

class DatabaseController extends Controller
{
    public static function db_connect()

    {
        $server_name = "localhost";
        $username = "root";
        $password = "";
        $db = "ministry_of_education";
        $conn = new \mysqli($server_name, $username, $password, $db);


// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }

    public static function insert($entity){

        $connection = DatabaseController::db_connect();
        $table = $entity->getTableName();
        $fieldNames = $entity->getFieldNames();
        $values = [];
        foreach ($fieldNames as $field){
            $method = 'get'.$field;
            $values [] = $entity->$method();
        }

        $values = implode("','", $values);
        $fields = implode(',', $fieldNames);
        $query = "INSERT INTO " . $table . "("  .$fields. ")" . "VALUES ('"  . $values . "')";
        $result=mysqli_query($connection, $query);
        return $result;
    }
    
    public static function update($entity){
        
    }
    
    public static function delete($entity){
        
    }
    
    public static function search($user_name,$password){

        $connection = DatabaseController::db_connect();
        $sql1="SELECT id,user_name,password,user_type FROM user where (user_name ='".$user_name."'and password ='".$password."')";
        $val=mysqli_query($connection,$sql1);
        if (mysqli_num_rows($val)) {
                $row=mysqli_fetch_row($val);
                return $row;
            }
        else{
            return null;
        }
            
    }
}

