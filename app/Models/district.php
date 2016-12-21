<?php
/**
 * Created by PhpStorm.
 * User: ThirasaraDevanmini
 * Date: 12/16/2016
 * Time: 2:13 PM
 */

namespace App\Models;



use App\Orm\EntityInterface;
use App\Http\Controllers\DatabaseController;

class District
{


    public static function getDistrict()
    {
        $connection=DatabaseController::db_connect();
        $sql="SELECT * from district ORDER by (city)";
        $data=mysqli_query($connection,$sql);
        //echo $data;
        $district_row=array();
        while($row=mysqli_fetch_row($data)){
            array_push($district_row,$row);

        }
        return $district_row;
    }

    public static function getSchool($dist)
    {
        $connection = DatabaseController::db_connect();
        $sql="SELECT school_id,school_name from school where ( district = (?))";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s",$dist[0]);
        $stmt->execute();
        $result = $stmt->get_result();
        echo $sql;
        $district_row=array();
        while($row=mysqli_fetch_row($result)){
            array_push($district_row,$row);

        }
        echo sizeof($district_row);
        return $district_row;
    }

}