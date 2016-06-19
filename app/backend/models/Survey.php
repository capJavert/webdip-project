<?php

require_once("Model.php");
require_once("ActiveRecord.php");

/**
 * Class Survey
 */
class Survey extends ActiveRecord
{
    public $created_by;
    public $category_id;
    public $name;
    public $date_added;
    public $date_updated;
    public $visible;
    public $date_start;
    public $date_end;
    public $date_visible;
    private static $table_name = "surveys";

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
        $this->setTableName(Survey::get_table_name());
    }

    /**
     * @return Model
     */
    public static function model()
    {
        $model = new Model(Survey::$table_name, get_class(new Survey()));

        return $model;
    }
}