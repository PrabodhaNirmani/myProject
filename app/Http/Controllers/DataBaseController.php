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
    
    public static function closeConnection($connection){
        
        mysqli_close($connection);
    }

    public static function insert($table,$fields,$values){
        $i=0;
        $val=[];
        while($i<sizeof($fields)){
            array_push($val,'?');
            echo $values[$i];
            $i=$i+1;
        }
        $val = implode(",", $val);

        $connection = DatabaseController::db_connect();
        $field = implode(',', $fields);
        $sql="INSERT INTO " . $table . "("  .$field. ")" . "VALUES ("  . $val . ")";
        echo $sql;
        $stmt = $connection->prepare($sql);
        $i=1;
        //echo sizeof($fields);
        while($i<=sizeof($fields)){
            $stmt->bind_param($i,$values[$i-1]);
            $i=$i+1;
        }
        $stmt->execute();
        $result = $stmt->get_result();
        return $connection;
    }
    
    public static function update($table,$fields,$values){

    }
    
    public static function delete($entity){
        
    }
    
    public static function search($user_name,$password){

        
            
    }
}

