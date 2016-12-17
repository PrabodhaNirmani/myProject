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

class ApplicantGuardian implements EntityInterface
{
    private $tableName = 'applicant_guardian';
    private $fieldNames = ['applicant_id','guardian_type','first_name','last_name','national_id_name','nationality_srilankan','religion','address_no','address_street','address_city','tele_no','div_sec_area','grama_nil_res_no'];
    private $last_name=null;
    private $applicant_id;
    private $first_name;
    private $sex;
    private $medium;
    private $religion;
    private $birth_day;

    public function setTableName($table)
    {
        $this->tableName=$table;
    }
    
    public function setFieldNames($fieldNames)
    {
        $this->fieldNames=$fieldNames;
    }

    public function getTableName()
    {
        return $this->tableName;
    }

    public function getFieldNames()
    {
        return $this->fieldNames;
    }

  

    public function createApplicantGuardian(Request $request){
        
        $name=$this->getTableName();
        $fields=$this->getTableName();
        $values = [];
        array_push($values,Auth::user()->id);
        foreach (getFieldNames() as $field){
            array_push($values,$request['field']);
        }
        $row =DatabaseController::insert($name,$fields,$values);

        return $row;
    }
}