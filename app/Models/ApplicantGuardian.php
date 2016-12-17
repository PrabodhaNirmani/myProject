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

class ApplicantGuardian 
{
    private $tableName = 'applicant_guardian';
    private $fieldNames = ['applicant_id','guardian_type','first_name','last_name','national_id_name','nationality_srilankan','religion','address_no','address_street','address_city','tele_no','div_sec_area','grama_nil_res_no'];
  

    public function createApplicantGuardian(Request $request){
        
        $name=$this->tableName;
        $fields=$this->fieldNames;
        $values = [];
        foreach ($fields as $field){
            array_push($values,$request[$field]);
        }
        $row =DatabaseController::insert($name,$fields,$values);

        return $row;
    }
}