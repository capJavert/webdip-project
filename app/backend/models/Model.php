<?php

require_once("Database.php");

/**
 * Class Model
 */
class Model
{
    public $database;
    public $tableName;
    public $className;

    /**
     * Model constructor.
     */
    public function __construct($tableName, $className) {
        $this->database = new Database();
        $this->tableName = $tableName;
        $this->className = $className;
    }

    /**
     * Model destructor
     */
    public function __destruct() {
        unset($this->database);
    }

    /**
     * Get all instances of model based on $criteria
     * @param null $criteria
     * @return array
     */
    public function findAll($criteria=null) {
        if($criteria) {
            return $this->database->get("SELECT * FROM $this->tableName $criteria->join WHERE $criteria->condition;", $this->className, $criteria->params);
        } else {
            return $this->database->get("SELECT * FROM $this->tableName;", $this->className);
        }

    }

    /**
     * Get model by PK
     * @param $id
     * @return array
     */
    public function findOne($id) {
        return $this->database->get("SELECT * FROM $this->tableName WHERE id=:id;", $this->className, array(
            ':id' => $id
        ));
    }
}