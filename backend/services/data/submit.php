<?php

require_once(__DIR__."/../../includes/Router.php");
require_once(__DIR__."/../../header.php");

/**
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

$saved = false;

if($validModel) {
    require_once(__DIR__."/../../models/".$modelName.".php");

    $model = $modelName::model()->findOne(Router::getParam("id"));

    if(!$model) {
        $model = new $modelName;
    }

    $newModel = json_decode(Router::getParam("object"), true);

    foreach($newModel as $key => $property) {
        if(is_bool($property['value'])) {
            $property['value'] = $property['value'] ? 1:0;
        }

        if($model->test($key)) {
            $model->$key = $property['value'];
        }
    }

    $saved = $model->save();
}

echo json_encode($saved);

?>