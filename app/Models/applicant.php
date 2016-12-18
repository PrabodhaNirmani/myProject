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
        //Auth::user()->id
        array_push($values,4);
        foreach ($fields as $field){
            array_push($values,$request[$field]);
        }
        $row =DatabaseController::insert($name,$fields,$values);

        return $row;
    }
}