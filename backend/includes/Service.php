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

        $specials = json_decode($this->options['params']);

        switch($constant) {
            case "GET_BY_ID": $condition = "id=:id";
                break;
            case "GET_BY_PROP": $condition = $specials->SPECprop."=:value";
                break;
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
                case 'condition':
                    $this->criteria->setCondition($this->addConstant($value));
                    break;
                case 'order': $this->criteria->setOrder($value);
                    break;
                case 'limit': $this->criteria->setLimit($value);
                    break;
                case 'params':
                    $value = json_decode($value);

                    foreach($value as $name => $param) {
                        if(strpos($name, 'SPEC')===false) {
                            $this->criteria->addParam($name, $param);
                        }
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
        $modelName = $this->model;

        if(new Criteria()!=$this->criteria) {
            $data = $modelName::model()->findAll($this->criteria);
        } else {
            $data = $modelName::model()->findAll();
        }

        if(!$data) {
            $data = new $modelName;
        }

        return $json ? json_encode($data):$data;
    }

    public function getForm($json = false, $files = null) {
        $modelName = $this->model;

        if($files) {
            $form = $modelName::formData($files);
        } else {
            $form = $modelName::formData();
        }

        return $json ? json_encode($form):$form;
    }
}