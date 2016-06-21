<?php

require_once("Model.php");
require_once("ActiveRecord.php");
require_once "File.php";
require_once "Device.php";

/**
 * Class FileDeviceAssigned
 */
class FileDeviceAssigned extends ActiveRecord
{
    public $file_id;
    public $device_id;
    public $alt;
    private static $table_name = "files_devices_assigned";

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
        $this->setTableName(FileDeviceAssigned::get_table_name());
    }

    /**
     * @return Model
     */
    public static function model()
    {
        $model = new Model(FileDeviceAssigned::$table_name, get_class(new FileDeviceAssigned()));

        return $model;
    }

    /**
     * Form data for model
     * @return array
     */
    public static function formData() {
        return array(
            'file_id' => array(
                'type' => 'dropdown',
                'label' => 'Datoteka',
                'data' => Helpers::prepareDropDown(File::model()->findAll(), 'id', 'name')
            ),
            'device_id' => array(
                'type' => 'dropdown',
                'label' => "Uređaj",
                'data' => Helpers::prepareDropDown(Device::model()->findAll(), 'id', 'name')
            ),
            'alt' => array(
                'type' => 'text',
                'label' => 'Opis'
            ),
        );
    }
}