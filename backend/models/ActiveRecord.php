<?php

require_once(__DIR__."/../includes/Helpers.php");

/**
 * Class ActiveRecord
 */

class ActiveRecord
{
    public $id;
    private $database;
    private $tableName;

    /**
     * @return Database
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @param Database $database
     */
    public function setDatabase($database)
    {
        $this->database = $database;
    }

    /**
     * @return mixed
     */
    public function getTableName()
    {
        return $this->tableName;
    }

    /**
     * @param mixed $tableName
     */
    public function setTableName($tableName)
    {
        $this->tableName = $tableName;
    }

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
     * @return array
     */
    public function save()
    {
        $this->beforeSave();

        if($this->id) {
            $sql = "UPDATE $this->tableName SET";

            foreach($this->attributes() as $attribute) {
                $value = $this->$attribute[0];
                $sql .= " $attribute[0]='$value',";
            }

            $sql = rtrim($sql, ",");
            $sql .= " WHERE id=$this->id;";
        } else {
            $sql = "INSERT INTO $this->tableName VALUES (default, ";

            foreach($this->attributes() as $attribute) {
                if($attribute[0]=='id') {
                    continue;
                }

                $value = $this->$attribute[0];
                $sql .= "'$value', ";
            }

            $sql = rtrim($sql, ", ");
            $sql .= ");";
        }

        if($this->id) {
            $return = array("success"=>$this->database->run($sql));
        } else {
            $return = array(
                "success"=>$this->database->run($sql),
                "id"=>$this->database->lastId()
            );
        }


        return $return;
    }

    public function delete() {
        $sql = "DELETE FROM $this->tableName WHERE id=$this->id;";

        return array("success"=>$this->database->run($sql));
    }

    /**
     * Get attributes
     * @return array
     */
    public function attributes() {
        $dbSchema = new PDO("mysql:dbname=information_schema;host=localhost", "WebDiP2015x005", "admin_Eurj", array(
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));

        $stmt = $dbSchema->prepare("SELECT COLUMN_NAME FROM COLUMNS
            WHERE TABLE_SCHEMA='WebDiP2015x005'
            AND TABLE_NAME='$this->tableName';");

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function beforeSave() {
    }
}