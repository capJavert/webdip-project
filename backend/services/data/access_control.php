<?php

require_once "../../header.php";
require_once "../../models/User.php";
require_once "../../models/UserRole.php";

/**
 * @var User $user
 */

if($user->id) {
    $logged = true;
} else {
    $logged = false;
}

$access = array(
    "access" => false,
    "logged" => $logged
);

$route = Router::getParam("route");

if(array_key_exists($route, $config['routes'])) {
    if(AccessControl::check($config['routes'][$route], $user->role_id)) {
        $access = array(
            "access" => true,
            "logged" => $logged
        );
    }
}

echo json_encode($access);

?>