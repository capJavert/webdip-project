<?php

require_once("Model.php");
require_once("ActiveRecord.php");
require_once "User.php";
require_once "Device.php";

/**
 * Class DeviceLike
 */
class DeviceLike extends ActiveRecord
{
    public $user_id;
    public $device_id;
    public $date_added;
    private static $table_name = "devices_likes";

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
        $this->setTableName(DeviceLike::get_table_name());
    }

    /**
     * @return Model
     */
    public static function model()
    {
        $model = new Model(DeviceLike::$table_name, get_class(new DeviceLike()));

        return $model;
    }

    /**
     * Form data for model
     * @return array
     */
    public static function formData() {
        return array(
            'user_id' => array(
                'type' => 'dropdown',
                'label' => 'Korisnik',
                'data' => Helpers::prepareDropDown(User::model()->findAll(), 'id', 'name')
            ),
            'device_id' => array(
                'type' => 'dropdown',
                'label' => "Uređaj",
                'data' => Helpers::prepareDropDown(Device::model()->findAll(), 'id', 'name')
            )
        );
    }
}