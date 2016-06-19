<?php

require_once("Model.php");
require_once("ActiveRecord.php");

/**
 * Class User
 */
class User extends ActiveRecord
{
    public $role_id;
    public $firstname;
    public $lastname;
    public $username;
    public $email;
    public $password;
    public $auth_key;
    public $active;
    public static $table_name = "users";

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->tableName = User::$table_name;
    }

    /**
     * @return Model
     */
    public static function model()
    {
        $model = new Model(User::$table_name, get_class(new User()));

        return $model;
    }
}