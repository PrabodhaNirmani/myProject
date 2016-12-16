<?php

interface EntityInterface{

    public function setTableName($table);

    public function setFieldNames($fieldNames);

    public function getTableName();

    public function getFieldNames();

}