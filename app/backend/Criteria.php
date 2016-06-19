<?php

/**
 * Class Criteria
 */
class Criteria
{
    public $join;
    public $condition;
    public $params = array();

    /**
     * Add param to params array
     * @param $key
     * @param $value
     */
    public function addParam($key, $value) {
        $params[$key] = $value;
    }
}