<?php

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
            $dropdown[$e->$key] = $e->$value;
        }

        return $dropdown;
    }
}