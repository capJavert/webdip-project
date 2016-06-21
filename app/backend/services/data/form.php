<?php

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

$data = array();

if($validModel) {
    require_once(__DIR__."/../../models/".$modelName.".php");

    $service = new Service(get_class(new $modelName), Router::params());

    $service->prepareData();

    if(Router::isGetForm()) {
        $data = $service->getForm();
    }

}

echo json_encode($data);

?>