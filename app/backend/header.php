<?php

require_once("models/User.php");
require_once("includes/Router.php");
require_once("includes/AccessControl.php");
require_once("includes/Criteria.php");
require_once("includes/Helpers.php");

$config = include("config.php");
define("APP_ROUTE", $config['env']['basepath']);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$user = new User();
$user->role_id = 0;

if(isset($_SESSION['user'])) {
    $newUser = User::findByKey($_SESSION['user']['token']);

    if($newUser) {
        $user = $newUser;
    }
}

?>