<?php
/**
 * Created by PhpStorm.
 * User: ThirasaraDevanmini
 * Date: 12/18/2016
 * Time: 5:15 PM
 */

namespace App\Models;


class Error
{
    public $error_description;
    public $error_no;
    public function __construct($error,$error_no)
    {
        $this->error_description = $error;
        $this->error_no = $error_no;
    }

    public function getErrorDescription()
    {
        return $this->error_description;
    }

    public function getErrorNo()
    {
        return $this->error_no;
    }
    
    
}