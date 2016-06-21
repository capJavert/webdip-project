<?php

require_once("Model.php");
require_once("ActiveRecord.php");

/**
 * Class SurveyField
 */
class SurveyField extends ActiveRecord
{
    public $survey_id;
    public $name;
    public $type;
    public $label;
    public $size;
    public $date_added;
    public $date_updated;
    public $options;
    public $required;
    private static $table_name = "surveys_fields";

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
        $this->setTableName(SurveyField::get_table_name());
    }

    /**
     * @return Model
     */
    public static function model()
    {
        $model = new Model(SurveyField::$table_name, get_class(new SurveyField()));

        return $model;
    }

    /**
     * Form data for model
     * @return array
     */
    public static function formData() {
        return array(
            'survey_id' => array(
                'type' => 'dropdown',
                'label' => 'Anketa'
            ),
            'name' => array(
                'type' => 'text',
                'label' => 'Naziv'
            ),
            'type' => array(
                'type' => 'text',
                'label' => "Tip"
            ),
            'label' => array(
                'type' => 'text',
                'label' => 'Oznaka'
            ),
            'size' => array(
                'type' => 'text',
                'label' => 'Broj znakova'
            ),
            'options' => array(
                'type' => 'text',
                'label' => 'Dodatno'
            ),
            'required' => array(
                'type' => 'checkbox',
                'label' => 'Required'
            )
        );
    }
}