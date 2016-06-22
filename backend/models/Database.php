<?php

/**
 * Class Database
 * @property PDOStatement $statement
 */
class Database extends PDO
{
    private $serverName = "localhost";
    private $username = "WebDiP2015x005";
    private $password = "admin_Eurj";
    private $dbName = "WebDiP2015x005";
    private $statement;

    /**
     * Database constructor.
     */
    public function __construct($dsn=null, $username=null, $passwd=null, $options=array())
    {
        parent::__construct("mysql:dbname=$this->dbName;host=$this->serverName", $this->username, $this->password, array(
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));

        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    /**
     * Database destructor
     */
    public function __destruct() {
        unset($this->conn);
    }

    /**
     * @param $params
     */
    private function params($params) {
        foreach($params as $key => $param) {
            $this->statement->bindParam($key, $param);
        }
    }

    /**
     * @param $sql
     * @param array $params
     * @return bool
     */
    public function run($sql, $params=array()) {
        $this->statement = $this->prepare($sql);

        foreach($params as $key => $value) {
            $this->statement->bindValue($key, $value);
        }

        $result = $this->statement->execute();
        $this->statement = null;

        return $result;
    }

    /**
     * @param $sql
     * @param array $params
     * @return array
     */
    public function get($sql, $class, $params=array()) {
        $this->statement = $this->prepare($sql);

        foreach($params as $key => $value) {
            $this->statement->bindValue($key, $value);
        }

        $this->statement->execute();
        $result = $this->statement->fetchAll(PDO::FETCH_CLASS, $class);
        $this->statement = null;

        return count($result)==1 ? $result[0]:$result;
    }

    public function lastId() {
        $this->statement = $this->prepare("SELECT LAST_INSERT_ID();");

        $this->statement->execute();
        $result = $this->statement->fetchAll();
        $this->statement = null;

        return $result[0][0];
    }
}
