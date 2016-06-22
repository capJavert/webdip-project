<?php

require_once(__DIR__."/../../models/DeviceStore.php");
require_once(__DIR__."/../../header.php");

$service = new Service(get_class(new DeviceStore()), Router::params());

$service->prepareData();

if(Router::isGetForm()) {
    $data = $service->getForm(true);
} else {
    $data = $service->getData(true);
}

echo $data;

?>