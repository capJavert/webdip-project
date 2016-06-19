<?php

/**
 * Class ActiveRecord
 */

class ActiveRecord
{
    public $id;
    public $database;
    public $tableName;

    /**
     * ActiveRecord constructor.
     */
    public function __construct() {
        $this->database = new Database();
    }

    /**
     * ActiveRecord destructor
     */
    public function __destruct() {
        unset($this->database);
    }

    /**
     * Save model
     * @return bool
     */
    public function save()
    {
        $sql = "UPDATE $this->tableName SET";

        foreach($this->attributes() as $attribute) {
            $value = $this->$attribute[0];
            $sql .= " $attribute[0]='$value',";
        }

        $sql = rtrim($sql, ",");
        $sql .= " WHERE id=$this->id;";

        return $this->database->run($sql);
    }

    /**
     * Get attributes
     * @return array
     */
    public function attributes() {
        $dbSchema = new PDO("mysql:dbname=information_schema;host=localhost", "root", "", array(
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));

        $stmt = $dbSchema->prepare("SELECT COLUMN_NAME FROM COLUMNS
            WHERE TABLE_SCHEMA='webdip_project'
            AND TABLE_NAME='$this->tableName';");

        $stmt->execute();

        return $stmt->fetchAll();
    }
}