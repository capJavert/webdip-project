<?php

require_once("Model.php");
require_once("ActiveRecord.php");

/**
 * Class DeviceExtended
 */
class DeviceExtended extends ActiveRecord
{
    public $device_id;
    public $date_release;
    public $cpu;
    public $ram;
    public $memory;
    public $graphics;
    public $wifi;
    public $internet;
    public $memory_cards;
    public $dual_sim;
    public $camera;
    public $front_camera;
    public $os;
    public $manufacturer;
    private static $table_name = "devices_extended";

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
        $this->setTableName(DeviceExtended::get_table_name());
    }

    /**
     * @return Model
     */
    public static function model()
    {
        $model = new Model(DeviceExtended::$table_name, get_class(new DeviceExtended()));

        return $model;
    }
}