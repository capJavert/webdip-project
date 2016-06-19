<?php

require_once("Model.php");
require_once("ActiveRecord.php");

/**
 * Class Log
 */
class Log extends ActiveRecord
{
    public $date_added;
    public $action;
    public $user_id;
    private static $table_name = "logs";

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
        $this->setTableName(Log::get_table_name());
    }

    /**
     * @return Model
     */
    public static function model()
    {
        $model = new Model(Log::$table_name, get_class(new Log()));

        return $model;
    }
}