<?php

require_once(__DIR__."/../../models/Device.php");

$service = new Service(get_class(new Device()), Router::params());

$service->prepareData();

if(Router::isGetForm()) {
    $data = $service->getForm(true);
} else {
    $data = $service->getData(true);
}

echo $data;

?>