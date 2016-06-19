<?php
/*******************************************************************************
* Class Name:       SurveyField
* File Name:        class.SurveyField.php
* Generated:        Sunday, Jun 19, 2016 - 15:18:26 CEST
*  - for Table:     surveys_fields
*   - in Database:  webdip_project
* Created by: table2class (http://www.stevenflesch.com/projects/table2class/)
********************************************************************************/

// Files required by class:
require_once("class.database.php");

// Begin Class "SurveyField"
class SurveyField {
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
		$sSQL = "SELECT * FROM surveys_fields WHERE id = $mID;";
		$oResult = $this->database->query($sSQL);
		$oResult = $this->database->result;
		$oRow = mysql_fetch_object($oResult);
		
		// Assign results to class.
		$this->id = $oRow->id; // Primary Key
	}
	
	public function insert() {
		$this->id = NULL; // Remove primary key value for insert
		$sSQL = "INSERT INTO surveys_fields () VALUES ();";
		$oResult = $this->database->query($sSQL);
		$this->id = $this->database->lastinsertid;
	}
	
	function update($mID) {
		$sSQL = "UPDATE surveys_fields SET (id = '$this->id') WHERE id = $mID;";
		$oResult = $this->database->Query($sSQL);
	}
	
	public function delete($mID) {
		$sSQL = "DELETE FROM surveys_fields WHERE id = $mID;";
		$oResult = $this->database->Query($sSQL);
	}

}
// End Class "SurveyField"
?>