<?php
/**
 * Created by PhpStorm.
 * User: ThirasaraDevanmini
 * Date: 12/16/2016
 * Time: 1:00 PM
 */

namespace App\Orm;


interface EntityInterface
{
    public function setTableName($table);

    public function setFieldNames($fieldNames);

    public function getTableName();

    public function getFieldNames();

}