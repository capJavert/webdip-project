<?php

require_once(__DIR__."/../../includes/Router.php");
require_once(__DIR__."/../../header.php");

/**
 * @var $data array
 * @var $model ActiveRecord
 * @var $modelName Device|ActiveRecord
 */

$modelName = Router::getParam("model");

$validModel = true;

try {
    require_once(__DIR__."/../../models/".$modelName.".php");
} catch (Exception $e) {
    $validModel = false;
}
$data = array();

if($validModel) {
    require_once(__DIR__."/../../models/".$modelName.".php");

    $service = new Service(get_class(new $modelName), Router::params());

    $service->prepareData();

    if(Router::isGetForm()) {
        $model = $modelName::model()->findOne(Router::getParam("id"));

        if(!$model) {
            $model = new $modelName;
        }

        $data = $service->getForm();

        foreach($data as $key => $field) {
            $data[$key]['value'] = $model->$key;

            if($key=='visible') {
                $data[$key]['value'] = $model->$key ? true:false;
            }
        }
    }

}

echo json_encode($data);

?>