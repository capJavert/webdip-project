<?php
/*******************************************************************************
* Class Name:       Log
* File Name:        class.Log.php
* Generated:        Sunday, Jun 19, 2016 - 15:17:59 CEST
*  - for Table:     logs
*   - in Database:  webdip_project
* Created by: table2class (http://www.stevenflesch.com/projects/table2class/)
********************************************************************************/

// Files required by class:
require_once("class.database.php");

// Begin Class "Log"
class Log {
	// Variable declaration
	public $id; // Primary Key
	public $database;
	
	// Class Constructor
	public function __construct() {
		$this->database = new Database();
		$this->database->SetSettings("localhost", "root", "", "webdip_project");
	}
	
	// Class Destructor
	public function __destruct() {
		unset($this->database);
	}
	
	// GET Functions
	public function getid() {
		return($this->id);
	}
	
	// SET Functions
	public function setid($mValue) {
		$this->id = $mValue;
	}
	
	public function select($mID) { // SELECT Function
		// Execute SQL Query to get record.
		$sSQL = "SELECT * FROM logs WHERE id = $mID;";
		$oResult = $this->database->query($sSQL);
		$oResult = $this->database->result;
		$oRow = mysql_fetch_object($oResult);
		
		// Assign results to class.
		$this->id = $oRow->id; // Primary Key
	}
	
	public function insert() {
		$this->id = NULL; // Remove primary key value for insert
		$sSQL = "INSERT INTO logs () VALUES ();";
		$oResult = $this->database->query($sSQL);
		$this->id = $this->database->lastinsertid;
	}
	
	function update($mID) {
		$sSQL = "UPDATE logs SET (id = '$this->id') WHERE id = $mID;";
		$oResult = $this->database->Query($sSQL);
	}
	
	public function delete($mID) {
		$sSQL = "DELETE FROM logs WHERE id = $mID;";
		$oResult = $this->database->Query($sSQL);
	}

}
// End Class "Log"
?>