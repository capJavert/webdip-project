<?php

require_once("Model.php");
require_once("ActiveRecord.php");

/**
 * Class CategoryLike
 */
class CategoryLike extends ActiveRecord
{
    public $category_id;
    public $user_id;
    public $date_added;
    private static $table_name = "categories_likes";

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
        $model = new Model(CategoryLike::$table_name, get_class(new CategoryLike()));

        return $model;
    }
}