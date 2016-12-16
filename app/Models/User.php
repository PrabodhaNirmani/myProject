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

class User implements  EntityInterface,Authenticatable
{
    private $tableName = 'user';
    private $fieldNames = ['user_name','password','user_type'];

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

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        // TODO: Implement getAuthIdentifierName() method.
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        // TODO: Implement getAuthIdentifier() method.
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.
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
}