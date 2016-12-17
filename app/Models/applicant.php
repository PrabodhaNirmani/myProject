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

class applicant extends User 
{
    private $tableName = 'applicant';
    private $fieldNames = ['applicant_id','first_name','last_name','sex','medium','religion','birth_day'];


    public function createApplicant(Request $request){

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