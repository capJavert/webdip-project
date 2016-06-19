<?php

require_once("Model.php");
require_once("ActiveRecord.php");

/**
 * Class SurveyData
 */
class SurveyData extends ActiveRecord
{
    public $field_id;
    public $user_id;
    public $data;
    private static $table_name = "surveys_data";

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
        $this->setTableName(SurveyData::get_table_name());
    }

    /**
     * @return Model
     */
    public static function model()
    {
        $model = new Model(SurveyData::$table_name, get_class(new SurveyData()));

        return $model;
    }
}