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

class ApplicantPriority 
{
    private $tableName = 'applicant_priority';
    private $fieldNames = ['applicant_id','school_id','last_name','priority','distance','num_between_school'];

    public function createApplicantPriority(Request $request){

        $name=$this->tableName;
        $fields=$this->fieldNames;
        $values = [];
        array_push($values,Auth::user()->id);
        foreach ($fields as $field){
            array_push($values,$request[$field]);
        }
        $row =DatabaseController::insert($name,$fields,$values);

        return $row;
    }
}