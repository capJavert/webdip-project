<?php

return array(
    "routes" => array(
        "/categories" => "categories.php",
        "/devices" => "devices.php",
        "/files" => "files.php",
        "/logs" => "logs.php",
        "/surveys" => "surveys.php",
        "/users" => "users.php",
        '/form' => "form.php",
        '/submit' => "submit.php",
        '/delete' => "delete.php"
    ),
    "db" => array(
        "serverName" => "localhost",
        "username" => "root",
        "password" => "",
        "dbName" => "webdip_project",
    ),
    "env" => array(
        "basepath" => "/",
        "type" => "dev"
    )
);