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

class applicant_guardian implements EntityInterface
{
    private $tableName = 'applicant_guardian';
    private $fieldNames = ['guardian_type','first_name','last_name','national_id_name','nationality_srilankan','religion','address_no','address_street','address_city','tele_no','div_sec_area','grama_nil_res_no'];
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

    public function setApplicant_Id($applicant_id)
    {
        $this->applicant_id = $applicant_id;
    }

    public function getApplicant_Id()
    {
        return $this->applicant_id;
    }

    public function setFirst_Name($first_name)
    {
        $this->first_name = $first_name;
    }

    public function getFirst_Name()
    {
        return $this->first_name;
    }

    public function setBirth_Day($birth_day)
    {
        $this->birth_day = $birth_day;
    }

    public function getBirth_Day()
    {
        return $this->birth_day;
    }

    public function setMedium($medium)
    {
        $this->medium = $medium;
    }

    public function getMedium()
    {
        return $this->medium;
    }

    public function setReligion($religion)
    {
        $this->religion = $religion;
    }

    public function getReligion()
    {
        return $this->religion;
    }

    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    public function getSex()
    {
        return $this->sex;
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

    public function getLast_Name()
    {
        return $this->last_name;
    }

    public function setLast_Name($last_name)
    {
        $this->last_name = $last_name;
    }

    public static function createApplicantGuardian(Request $request){

        $applicant=new applicant();
        $applicant->setApplicantId(Auth::user()->id);
        $applicant->setFirst_Name($request['first_name']);
        $applicant->setLast_Name($request['last_name']);
        $applicant->setBirth_Day($request['birth_day']);
        $applicant->setMedium($request['medium']);
        $applicant->setReligion($request['religion']);
        $applicant->setSex($request['sex']);

        $row =DatabaseController::insert($applicant);

        return $row;
    }
}