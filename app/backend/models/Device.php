<?php

require_once("Model.php");
require_once("ActiveRecord.php");

/**
 * Class Device
 */
class Device extends ActiveRecord
{
    public $created_by;
    public $category_id;
    public $name;
    public $date_added;
    public $date_updated;
    public $visible;
    private static $table_name = "devices";

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
        $this->setTableName(Device::get_table_name());
    }

    /**
     * @return Model
     */
    public static function model()
    {
        $model = new Model(Device::$table_name, get_class(new Device()));

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
                'label' => "Kategorija"
            ),
            'name' => array(
                'type' => 'text',
                'label' => 'Naziv'
            ),
            'visible' => array(
                'type' => 'checkbox',
                'label' => 'Prikaži'
            )
        );
    }
}