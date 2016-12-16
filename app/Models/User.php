<?php
/**
 * Created by PhpStorm.
 * User: ThirasaraDevanmini
 * Date: 12/16/2016
 * Time: 11:36 AM
 */

namespace App\Models;

use App\Orm\EntityInterface;

class User implements  EntityInterface
{
    private $tableName = 'user';
    private $fieldNames = ['user_name','password','user_type'];

    private $user_name;
    private $password;
    private $user_type;

    public function setUser_Name($user_name)
    {
        $this->user_name = $user_name;
    }

    public function setUser_Type($user_type)
    {
        $this->user_type = $user_type;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getUser_Name()
    {
        return $this->user_name;
    }

    public function getUser_Type()
    {
        return $this->user_type;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setTableName($table)
    {
        $this->user_type = $table;
    }

    public function setFieldNames($fieldNames)
    {
        $this->fieldNames = $fieldNames;
    }

    public function getTableName()
    {
       return $this->tableName;
    }

    public function getFieldNames()
    {
        return $this->fieldNames;
    }
}