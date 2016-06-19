<?php

require_once("Model.php");
require_once("ActiveRecord.php");

/**
 * Class DeviceStore
 */
class DeviceStore extends ActiveRecord
{
    public $created_by;
    public $name;
    public $address;
    public $postal_code;
    public $city;
    public $county;
    public $country;
    public $phone;
    public $latitude;
    public $longitude;
    private static $table_name = "devices_stores";

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
        $this->setTableName(DeviceStore::get_table_name());
    }

    /**
     * @return Model
     */
    public static function model()
    {
        $model = new Model(DeviceStore::$table_name, get_class(new DeviceStore()));

        return $model;
    }
}