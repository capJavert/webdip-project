<?php

require_once(__DIR__."/../models/Log.php");
require_once(__DIR__."/../models/Time.php");

/**
 * Class Helpers
 */
class Helpers
{
    /**
     * @param $array
     * @param $key
     * @param $value
     * @return array
     */
    public static function prepareDropDown($array, $key, $value) {
        $dropdown = array();

        foreach($array as $e) {
            $dropdown[] = array("id"=>$e->$key, "name"=>$e->$value);
        }

        return $dropdown;
    }

    public static function time() {
        $time = Time::model()->findOne(1);

        return $time->adjust+time();
    }
	

	public static function log($action, $id) {
        $log = new Log();
		$log->action = $action;
		$log->user_id = $id;
		
		$log->save();
    }
}