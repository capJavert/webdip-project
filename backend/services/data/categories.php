<?php

require_once(__DIR__."/../../models/Category.php");
require_once(__DIR__."/../../header.php");

$service = new Service(get_class(new Category()), Router::params());

$service->prepareData();

if(Router::isGetForm()) {
    $data = $service->getForm(true);
} else {
    $data = $service->getData(true);
}

echo $data;

?>