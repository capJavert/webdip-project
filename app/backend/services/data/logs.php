<?php

require_once(__DIR__."/../../models/Log.php");

$service = new Service(get_class(new Log()), Router::params());

$service->prepareData();
$data = $service->getData(true);

echo $data;

?>