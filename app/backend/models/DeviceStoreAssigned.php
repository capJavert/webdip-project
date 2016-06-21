<?php

require_once("Model.php");
require_once("ActiveRecord.php");

/**
 * Class DeviceStoreAssigned
 */
class DeviceStoreAssigned extends ActiveRecord
{
    public $device_id;
    public $store_id;
    public $date_added;
    private static $table_name = "devices_stores_assigned";

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
        $this->setTableName(DeviceStoreAssigned::get_table_name());
    }

    /**
     * @return Model
     */
    public static function model()
    {
        $model = new Model(DeviceStoreAssigned::$table_name, get_class(new DeviceStoreAssigned()));

        return $model;
    }

    /**
     * Form data for model
     * @return array
     */
    public static function formData() {
        return array(
            'device_id' => array(
                'type' => 'dropdown',
                'label' => 'Uređaj'
            ),
            'store_id' => array(
                'type' => 'dropdown',
                'label' => "Trgovina"
            ),
        );
    }
}