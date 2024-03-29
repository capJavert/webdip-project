<?php

require_once("Model.php");
require_once("ActiveRecord.php");

/**
 * Class UserRole
 */
class UserRole extends ActiveRecord
{
    public $name;
    public $rules;
    public $superuser;
    private static $table_name = "users_roles";

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
        $this->setTableName(UserRole::get_table_name());
    }

    /**
     * @return Model
     */
    public static function model()
    {
        $model = new Model(UserRole::$table_name, get_class(new UserRole()));

        return $model;
    }

    /**
     * Form data for model
     * @return array
     */
    public static function formData() {
        return array(
            'name' => array(
                'type' => 'text',
                'label' => 'Naziv'
            ),
            'rules' => array(
                'type' => 'text',
                'label' => 'Pravila'
            ),
            'superuser' => array(
                'type' => 'checkbox',
                'label' => 'Super korisnik'
            )
        );
    }
}