<?php
/*******************************************************************************
* Class Name:       DeviceExtended
* File Name:        class.DeviceExtended.php
* Generated:        Sunday, Jun 19, 2016 - 15:17:00 CEST
*  - for Table:     devices_extended
*   - in Database:  webdip_project
* Created by: table2class (http://www.stevenflesch.com/projects/table2class/)
********************************************************************************/

// Files required by class:
require_once("class.database.php");

// Begin Class "DeviceExtended"
class DeviceExtended {
	// Variable declaration
	public $device_id; // Primary Key
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
	public function getdevice_id() {
		return($this->device_id);
	}
	
	// SET Functions
	public function setdevice_id($mValue) {
		$this->device_id = $mValue;
	}
	
	public function select($mID) { // SELECT Function
		// Execute SQL Query to get record.
		$sSQL = "SELECT * FROM devices_extended WHERE device_id = $mID;";
		$oResult = $this->database->query($sSQL);
		$oResult = $this->database->result;
		$oRow = mysql_fetch_object($oResult);
		
		// Assign results to class.
		$this->device_id = $oRow->device_id; // Primary Key
	}
	
	public function insert() {
		$this->device_id = NULL; // Remove primary key value for insert
		$sSQL = "INSERT INTO devices_extended () VALUES ();";
		$oResult = $this->database->query($sSQL);
		$this->device_id = $this->database->lastinsertid;
	}
	
	function update($mID) {
		$sSQL = "UPDATE devices_extended SET (device_id = '$this->device_id') WHERE device_id = $mID;";
		$oResult = $this->database->Query($sSQL);
	}
	
	public function delete($mID) {
		$sSQL = "DELETE FROM devices_extended WHERE device_id = $mID;";
		$oResult = $this->database->Query($sSQL);
	}

}
// End Class "DeviceExtended"
?>