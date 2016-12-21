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
class ApplicantGuardian 
{
    private $tableName = 'applicant_guardian';
    private $fieldNames = ['applicant_id','guardian_type','first_name','last_name','national_id_no','nationality_srilankan','religion','address_no','address_street','address_city','district','tele_no','div_sec_area','grama_nil_res_no'];
  

    public function createApplicantGuardian(Request $request){
        
        $name=$this->tableName;
        $fields=$this->fieldNames;
        $values = [];
        foreach ($fields as $field)
        {   
            if($field=='nationality_srilankan'){
                if($request['nationality_srilankan']=='on'){
                    array_push($values,1);        
                }
                else{
                    array_push($values,0);
                }
            
            }
            else{
                array_push($values,$request[$field]);    
            }
            
        }
        $row =DatabaseController::insert($name,$fields,$values);

        return $row;
    }
}