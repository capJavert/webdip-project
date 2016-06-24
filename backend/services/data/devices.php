<?php

require_once(__DIR__."/../../models/Device.php");
require_once(__DIR__."/../../header.php");

$service = new Service(get_class(new Device()), Router::params());

$service->prepareData();

//var_dump($service->getCriteria()->getQuery()) or die;

if(Router::isGetForm()) {
    $data = $service->getForm(true);
} else {
    $data = $service->getData(true);
}

echo $data;

?>