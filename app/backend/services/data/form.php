<?php

$modelName = Router::getParam("model");

require_once(__DIR__."/../../models/".$modelName.".php");

$service = new Service(get_class(new $modelName), Router::params());

$service->prepareData();

$data = array();

if(Router::isGetForm()) {
    $data = $service->getForm(true);
}

echo $data;

?>