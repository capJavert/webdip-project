<?php

require_once("Model.php");
require_once("ActiveRecord.php");
require_once("Category.php");

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

    /**
     * Form data for model
     * @return array
     */
    public static function formData() {
        return array(
            'created_by' => array(
                'type' => 'text',
                'label' => 'Autor'
            ),
            'category_id' => array(
                'type' => 'dropdown',
                'label' => "Kategorija",
                'data' => Helpers::prepareDropDown(Category::model()->findAll(), 'id', 'name')
            ),
            'name' => array(
                'type' => 'text',
                'label' => 'Naziv'
            ),
            'visible' => array(
                'type' => 'checkbox',
                'label' => 'Prikaži'
            ),
            'date_start' => array(
                'type' => 'date',
                'label' => 'Datum do'
            ),
            'date_end' => array(
                'type' => 'date',
                'label' => 'Datum do'
            ),
            'date_visible' => array(
                'type' => 'date',
                'label' => 'Datum vidljivosti'
            ),
        );
    }
}