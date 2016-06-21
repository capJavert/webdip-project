<?php

require_once("Model.php");
require_once("ActiveRecord.php");
require_once("UserRole.php");

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

    /**
     * Form data for model
     * @return array
     */
    public static function formData() {
        return array(
            'role_id' => array(
                'type' => 'dropdown',
                'label' => 'Uloga'
            ),
            'firstname' => array(
                'type' => 'text',
                'label' => 'Ime'
            ),
            'lastname' => array(
                'type' => 'text',
                'label' => "Prezime"
            ),
            'username' => array(
                'type' => 'text',
                'label' => 'Korisničko ime'
            ),
            'email' => array(
                'type' => 'email',
                'label' => 'Email'
            ),
            'password' => array(
                'type' => 'text',
                'label' => 'Lozinka'
            ),
            'active' => array(
                'type' => 'checkbox',
                'label' => 'Aktiviran'
            )
        );
    }

    public static function findByKey($key) {
        return self::getDatabase()->get("SELECT * FROM users WHERE auth_key=:key;", get_class(new User()), array(
            ':key' => $key
        ));
    }

    public function role() {
        if($this->role_id) {
            return $this->getDatabase()->get("SELECT * FROM users_roles WHERE id=:roleId;", get_class(new UserRole()), array(
                ':roleId' => $this->role_id
            ));
        } else {
            return "Guest";
        }
    }
}