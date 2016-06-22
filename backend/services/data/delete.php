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

$deleted = false;

if($validModel) {
    $model = $modelName::model()->findOne(Router::getParam("id"));

    if($model) {
        $deleted = $model->delete();
    }
}

echo json_encode($deleted);

?>