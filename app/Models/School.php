<?php
/**
 * Created by PhpStorm.
 * User: ThirasaraDevanmini
 * Date: 12/16/2016
 * Time: 2:13 PM
 */

namespace App\Models;


use App\Http\Controllers\DatabaseController;
use Illuminate\Http\Request;
use Auth;

class School
{
    private $fieldNames =['school_id','school_name','school_type','street','city','max_no_student'];
    private $tableName = 'school';
    public function addSchool(Request $request){
        
        $values = [];
        foreach ($this->fieldNames as $field){
            array_push($values,$request[$field]);
        }
        
        DatabaseController::insert()


    }

}