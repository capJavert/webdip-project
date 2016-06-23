<?php

require_once(__DIR__."/../../models/File.php");
require_once(__DIR__."/../../header.php");

$service = new Service(get_class(new File()), Router::params());

$service->prepareData();

if(Router::isGetForm()) {
    $data = $service->getForm(true);
} else {
    $data = $service->getData();
}

if(count($data)==1) {
    $data = array($data);
}

echo json_encode($data);

?>