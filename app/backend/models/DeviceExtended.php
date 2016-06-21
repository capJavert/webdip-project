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
            'date_release' => array(
                'type' => 'date',
                'label' => "Datum izlaska"
            ),
            'cpu' => array(
                'type' => 'text',
                'label' => 'CPU'
            ),
            'ram' => array(
                'type' => 'text',
                'label' => 'RAM'
            ),
            'memory' => array(
                'type' => 'text',
                'label' => 'Memorija'
            ),
            'graphics' => array(
                'type' => 'text',
                'label' => 'Grafika'
            ),
            'wifi' => array(
                'type' => 'text',
                'label' => 'Wifi'
            ),
            'internet' => array(
                'type' => 'text',
                'label' => 'Internet'
            ),
            'memory_cards' => array(
                'type' => 'text',
                'label' => 'Vanjska memorija'
            ),
            'dual_sim' => array(
                'type' => 'text',
                'label' => 'Dual SIM'
            ),
            'camera' => array(
                'type' => 'text',
                'label' => 'Kamera'
            ),
            'front_camera' => array(
                'type' => 'text',
                'label' => 'Prednja kamera'
            ),
            'os' => array(
                'type' => 'text',
                'label' => 'OS'
            ),
            'manufacturer' => array(
                'type' => 'text',
                'label' => 'Proizvođač'
            )
        );
    }
}