<?php
/*******************************************************************************
* Class Name:       CategoryUserAssigned
* File Name:        class.CategoryUserAssigned.php
* Generated:        Sunday, Jun 19, 2016 - 15:16:43 CEST
*  - for Table:     categories_users_assigned
*   - in Database:  webdip_project
* Created by: table2class (http://www.stevenflesch.com/projects/table2class/)
********************************************************************************/

// Files required by class:
require_once("class.database.php");

// Begin Class "CategoryUserAssigned"
class CategoryUserAssigned {
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
		$sSQL = "SELECT * FROM categories_users_assigned WHERE id = $mID;";
		$oResult = $this->database->query($sSQL);
		$oResult = $this->database->result;
		$oRow = mysql_fetch_object($oResult);
		
		// Assign results to class.
		$this->id = $oRow->id; // Primary Key
	}
	
	public function insert() {
		$this->id = NULL; // Remove primary key value for insert
		$sSQL = "INSERT INTO categories_users_assigned () VALUES ();";
		$oResult = $this->database->query($sSQL);
		$this->id = $this->database->lastinsertid;
	}
	
	function update($mID) {
		$sSQL = "UPDATE categories_users_assigned SET (id = '$this->id') WHERE id = $mID;";
		$oResult = $this->database->Query($sSQL);
	}
	
	public function delete($mID) {
		$sSQL = "DELETE FROM categories_users_assigned WHERE id = $mID;";
		$oResult = $this->database->Query($sSQL);
	}

}
// End Class "CategoryUserAssigned"
?>