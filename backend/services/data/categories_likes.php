<?php

require_once(__DIR__."/../../models/CategoryLike.php");
require_once(__DIR__."/../../header.php");

$service = new Service(get_class(new CategoryLike()), Router::params());

$service->prepareData();

if(Router::isGetForm()) {
    $data = $service->getForm(true);
} else {
    $data = $service->getData(true);
}

echo $data;

?>