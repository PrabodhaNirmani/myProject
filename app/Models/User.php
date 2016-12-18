<?php
/**
 * Created by PhpStorm.
 * User: ThirasaraDevanmini
 * Date: 12/16/2016
 * Time: 11:36 AM
 */

namespace App\Models;

use App\Orm\EntityInterface;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Http\Controllers\DatabaseController;
use Illuminate\Http\Request;

class User implements  EntityInterface,Authenticatable
{
    private static $tableName = 'user';
    private static $fieldNames = ['user_name','password','user_type'];

    private $id = null;
    private $user_name = null;
    private $password = null;
    private $user_type = null;

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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return "id";

    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {


        return $this->id;

    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getAuthAccountType()
    {
        return $this->user_type;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }

    public static function authenticate(Request $request){

        $user_name = $request['user_name'];
        $password = $request['password'];
        $connection = DatabaseController::db_connect();
        $sql="SELECT id,user_name,password,user_type FROM user where (user_name ='".$user_name."'and password ='".$password."')";
        $row=mysqli_query($connection,$sql);
        if (mysqli_num_rows($row)) {
            $result=mysqli_fetch_row($row);
        }
        else{
            $result = null;
        }

        if (count($result) == 0){
            return $result;
        }

        $user = new User();
        $user->setId($result[0]);
        $user->setUser_Name($result[1]);
        $user->setPassword($result[2]);
        $user->setUser_Type($result[3]);
        return $user;
    }

    public static function schoolSignUp(Request $request){

        $values = [];
        $user_name = $request['user_name'];
        $password = $request['password'];
        array_push($values,$user_name);
        array_push($values,$password);
        array_push($values,"school");
        
        
        $result = DatabaseController::insert(User::$tableName,User::$fieldNames,$values);
            
            
        if ($result){
            $user = new User();
            $user->setUser_Name($user_name);
            $user->setPassword($password);
            $user->setUser_Type("school");
            return $user;
        }
        else {

            $error = new Error(mysqli_error($result),mysqli_connect_errno($result));
            return $error;
        }
        

    }
}