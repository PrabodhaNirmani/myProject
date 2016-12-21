<?php
/**
 * Created by PhpStorm.
 * User: Surani Hiranyada
 * Date: 12/17/2016
 * Time: 3:15 PM
 */

namespace App\Models;


use App\Orm\EntityInterface;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\DatabaseController;

class applicant extends User
{
    private $tableName = 'applicant';
    private $fieldNames = ['applicant_id','first_name','last_name','sex','medium','religion','birth_day'];


    public function createApplicant(Request $request){
        $name=$this->tableName;
        $fields=$this->fieldNames;
        $values = [];
        foreach ($fields as $field){
            array_push($values,$request[$field]);
        }
        $sql ="INSERT  INTO applicant(applicant_id,first_name,last_name,sex,medium,religion,birth_day) VALUES(?,?,?,?,?,?,?)";
        //$row =DatabaseController::insert($name,$fields,$values);
        $connection = DatabaseController::db_connect();
        //$sql = "SELECT past_stu_id from past_student where ( membership_id =(?))";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("issssss",$values[0],$values[1],$values[2],$values[3],$values[4],$values[5],$values[6]);
        $stmt->execute();
        $data = $stmt->get_result();
        return $connection;
    }
}