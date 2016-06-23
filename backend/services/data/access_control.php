<?php

require_once "../../header.php";
require_once "../../models/User.php";
require_once "../../models/UserRole.php";

/**
 * @var User $user
 */

$access = array(
    "access" => false,
);

$route = Router::getParam("route");

if(array_key_exists($route, $config['routes'])) {
    if(AccessControl::check($config['routes'][$route], $user->role_id)) {
        $access = array(
            "access" => true,
        );
    }
}

echo json_encode($access);

?>