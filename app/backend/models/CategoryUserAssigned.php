<?php

require_once("Model.php");
require_once("ActiveRecord.php");

/**
 * Class CategoryUserAssigned
 *
 */
class CategoryUserAssigned extends ActiveRecord
{
    public $user_id;
    public $category_id;
    public $date_added;
    private static $table_name = "categories_users_assigned";

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
        $model = new Model(CategoryUserAssigned::$table_name, get_class(new CategoryUserAssigned()));

        return $model;
    }

    /**
     * Form data for model
     * @return array
     */
    public static function formData() {
        return array(
            'user_id' => array(
                'type' => 'text',
                'label' => 'Korisnik'
            ),
            'category_id' => array(
                'type' => 'dropdown',
                'label' => "Kategorija"
            )
        );
    }
}