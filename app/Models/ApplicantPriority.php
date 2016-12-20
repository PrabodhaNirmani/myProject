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
class ApplicantPriority 
{
    private $tableName = 'applicant_priority';
    private $fieldNames = ['school_id','applicant_id','priority','distance','num_between_school'];

    public function createApplicantPriority(Request $request){
        echo $request;
        $name=$this->tableName;
        $fields=$this->fieldNames;
        $values = [];
        $fields1=array_slice($this->fieldNames,1);
        $id=(explode("-",$request['school_id']));
        $id=$id[0];
        array_push($values,1);
        foreach ($fields1 as $field){
            array_push($values,$request[$field]);
        }
        $row =DatabaseController::insert($name,$fields,$values);

        return $row;
    }
}