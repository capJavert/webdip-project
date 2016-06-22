<?php

require_once(__DIR__."/../../models/DeviceStoreAssigned.php");
require_once(__DIR__."/../../header.php");

$service = new Service(get_class(new DeviceStoreAssigned()), Router::params());

$service->prepareData();

if(Router::isGetForm()) {
    $data = $service->getForm(true);
} else {
    $data = $service->getData(true);
}

echo $data;

?>