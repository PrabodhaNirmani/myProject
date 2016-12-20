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


        $connection = DatabaseController::db_connect();
        $values = implode("','", $values);
        $fields = implode(',', $fields);
        $query = "INSERT INTO " . $table . "("  .$fields. ")" . "VALUES ('"  . $values . "')";
        echo $query;
        mysqli_query($connection, $query);
        return $connection;
    }
    
    public static function update($table,$fields,$values){

    }
    
    public static function delete($entity){
        
    }
    
    public static function search($user_name,$password){

        
            
    }
}

