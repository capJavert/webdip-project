<?php

require_once("Model.php");
require_once("ActiveRecord.php");
require_once "User.php";
require_once "SurveyField.php";

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

    /**
     * Form data for model
     * @return array
     */
    public static function formData() {
        return array(
            'field_id' => array(
                'type' => 'dropdown',
                'label' => 'Naziv polja',
                'data' => Helpers::prepareDropDown(SurveyField::model()->findAll(), 'id', 'name')
            ),
            'user_id' => array(
                'type' => 'dropdown',
                'label' => "Korisnik",
                'data' => Helpers::prepareDropDown(User::model()->findAll(), 'id', 'username')
            ),
            'data' => array(
                'type' => 'text',
                'label' => 'Odgovor'
            )
        );
    }
}