<?php

include("../header.php");

$notFound = true;

foreach($config["routes"] as $key => $value) {
    if($key==Router::parse()) {
        $notFound = false;
        require_once("data/$value");
    }
}

if($notFound) {
    header("Location: /error/404");
}