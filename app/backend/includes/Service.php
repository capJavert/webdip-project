<?php

require_once("Criteria.php");

/**
 * Class Service
 */
class Service
{
    public $model;
    public $options;
    public $isArray = false;
    private $criteria;

    public function __construct($model, $options) {
        $this->model = $model;
        $this->options = $options;
    }

    /**
     * @param $constant
     * @return string
     */
    private function addConstant($constant) {
        $condition = "";

        switch($constant) {
            case "GET_BY_ID": $condition = "id=:CId";
        }

        return $condition;
    }

    /**
     * Load service options to Criteria
     */
    public function prepareData() {
        $this->criteria = new Criteria();

        foreach($this->options as $key=>$value) {
            switch($key) {
                case 'join': $this->criteria->setJoin($value);
                    break;
                case 'condition': $this->criteria->setCondition($this->addConstant($value));
                    break;
                case 'order': $this->criteria->setOrder($value);
                    break;
                case 'limit': $this->criteria->setLimit($value);
                    break;
                case 'params':
                    foreach($value as $name => $param) {
                        $this->criteria->addParam($name, $param);
                    }
                    break;
            }
        }
    }

    /**
     * @param bool $json
     * @return array|string
     */
    public function getData($json = false) {
        if(new Criteria()!=$this->criteria) {
            $data = Device::model()->findAll($this->criteria);
        } else {
            $data = Device::model()->findAll();
        }

        return $json ? json_encode($data):$data;
    }
}