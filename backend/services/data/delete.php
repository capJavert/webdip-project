<?php

require_once(__DIR__."/../../includes/Router.php");
require_once(__DIR__."/../../header.php");

$modelName = Router::getParam("model");

$validModel = false;

switch($modelName) {
    case 'Device': $validModel = true;
        break;
    case 'Category': $validModel = true;
        break;
    case 'File': $validModel = true;
        break;
    case 'Log': $validModel = true;
        break;
    case 'Survey': $validModel = true;
        break;
    case 'User': $validModel = true;
        break;
}

$deleted = false;

if($validModel) {
    require_once(__DIR__."/../../models/".$modelName.".php");

    $model = $modelName::model()->findOne(Router::getParam("id"));

    if($model) {
        $deleted = $model->delete();
    }
}

echo json_encode($deleted);

?>