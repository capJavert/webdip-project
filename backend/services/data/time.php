<?php

require_once(__DIR__."/../../models/Time.php");
require_once(__DIR__."/../../header.php");

$service = new Service(get_class(new Time()), Router::params());

$service->prepareData();

if(Router::isGetForm()) {
    $data = $service->getForm(true);
} else {
    $data = $service->getData();
}

echo json_encode(array($data));

?>