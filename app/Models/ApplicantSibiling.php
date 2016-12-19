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
class ApplicantSibiling
{
    private $tableName = 'applicant_sibiling';
    private $fieldNames = ['applicant_id','present_stu_id1','present_stu_id2','present_stu_id3'];


    public function createApplicantSibiling(Request $request){

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