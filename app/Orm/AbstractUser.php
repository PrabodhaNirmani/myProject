<?php
/**
 * Created by PhpStorm.
 * User: ThirasaraDevanmini
 * Date: 12/16/2016
 * Time: 11:51 AM
 */

namespace App\Orm;

use EntityInterface;

class AbstractUser implements  EntityInterface
{
    private $tableName;
    private $fieldNames;
    
    
    
    

    public function setTableName($table)
    {
        $this->tableName = $table;
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