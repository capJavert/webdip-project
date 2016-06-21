<?php

require_once(__DIR__."/../../models/Survey.php");

$service = new Service(get_class(new Survey()), Router::params());

$service->prepareData();
$data = $service->getData(true);

echo $data;

?>