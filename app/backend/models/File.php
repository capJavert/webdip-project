<?php

require_once("Model.php");
require_once("ActiveRecord.php");
require_once "User.php";

/**
 * Class File
 */
class File extends ActiveRecord
{
    public $added_by;
    public $name;
    public $original_name;
    public $extension;
    public $size;
    public $tags;
    private static $table_name = "files";

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
        $this->setTableName(File::get_table_name());
    }

    /**
     * @return Model
     */
    public static function model()
    {
        $model = new Model(File::$table_name, get_class(new File()));

        return $model;
    }

    /**
     * Form data for model
     * @return array
     */
    public static function formData() {
        return array(
            'added_by' => array(
                'type' => 'dropdown',
                'label' => 'Autor',
                'data' => Helpers::prepareDropDown(User::model()->findAll(), 'id', 'username')
            ),
            'name' => array(
                'type' => 'text',
                'label' => "Ime"
            ),
            'original_name' => array(
                'type' => 'text',
                'label' => 'Izvorno ime'
            ),
            'extension' => array(
                'type' => 'text',
                'label' => 'ekstenzija'
            ),
            'size' => array(
                'type' => 'text',
                'label' => 'Veličina'
            ),
            'tags' => array(
                'type' => 'text',
                'label' => 'Oznake'
            ),
        );
    }
}