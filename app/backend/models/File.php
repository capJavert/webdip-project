<?php

require_once("Model.php");
require_once("ActiveRecord.php");

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
}