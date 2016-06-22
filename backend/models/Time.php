<?php

require_once("Model.php");
require_once("ActiveRecord.php");

/**
 * Class Time
 */
class Time extends ActiveRecord {
    public $adjust;
    private static $table_name = "time";

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
        $this->setTableName(Time::get_table_name());
    }

    /**
     * @return Model
     */
    public static function model()
    {
        $model = new Model(Time::$table_name, get_class(new Time()));

        return $model;
    }

    /**
     * Form data for model
     * @return array
     */
    public static function formData() {
        return array(
            'adjust' => array(
                'type' => 'text',
                'label' => 'Pomak'
            ),
        );
    }
}