<?php

require_once(__DIR__."/../../includes/Router.php");
require_once(__DIR__."/../../header.php");
require_once __DIR__."/../../models/User.php";

/**
 * @var $model User
 */

session_destroy();

if(isset($_COOKIE['user'])) {
	unset($_COOKIE['user']);
    setcookie('user', null, -1, '/');
}

$user = new User();
$user->role_id = 0;

header("Location: /WebDiP/2015_projekti/WebDiP2015x005/#/devices");

?>