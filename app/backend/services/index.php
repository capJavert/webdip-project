<?php

require_once("../header.php");
require_once("../includes/Service.php");

$notFound = true;
$serviceName = "default";

foreach($config["routes"] as $key => $value) {
    if($key==Router::parse()) {
        $notFound = false;
        include_once("data/".$value);
    }
}

if($notFound) {
    header("Location: /error/404");
}