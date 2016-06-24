<?php

require_once("Database.php");

/**
 * Class Model
 */
class Model
{
    private $database;
    private $tableName;
    private $className;

    /**
     * @return mixed
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @param mixed $className
     */
    public function setClassName($className)
    {
        $this->className = $className;
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
     * @param Criteria $criteria
     * @return array|ActiveRecord
     */
    public function findAll($criteria=null) {
        if($criteria) {
            return $this->database->get("SELECT $criteria->select FROM $this->tableName $criteria->join $criteria->condition $criteria->order $criteria->group;", $this->className, $criteria->params);
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