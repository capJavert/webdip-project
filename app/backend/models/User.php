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
    private static $table_name = "users";

    /**
     * @return string
     */
    public static function get_table_name()
    {
        return self::$table_name;
    }

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setTableName(User::get_table_name());
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